<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests\CreateReportRequest;

use App\Models\Contact;
use App\Models\User;
use App\Models\Address;
use App\Models\Payment;

class WebController extends Controller
{
    public function saveReport(CreateReportRequest $request) {
    	try {
    		Contact::create($request->all());
    		session()->flash('success', 'Successfully submitted!');
    	} catch (\Exception $e) {
    		session()->flash('error', 'Something went wrong!');
    	}

    	return redirect()->route('contact');
    }

    public function referral(Request $request, $username)
    {
    	$referral = User::where('username', $username)->active()->first();

        $amount  = 1499;

    	if ( !$referral ) {
    		return redirect('/');
    	}

        $users = User::where('id', '!=', 1)->active()->get();

        if ( count($request->all()) > 0 ) {
            $validatedData = $request->validate([
                'first_name'    => 'required|min:2',
                'last_name'     => 'required|min:2',
                'email'         => 'required|email',
                'phone'         => 'required',
                'username'      => 'required|min:4',
                'password'      => 'required|confirmed',
                'sponsor_name'  => 'nullable',
            ]);

            try {
                DB::beginTransaction();

                $referral_id = $referral->id;

                if ( $request->sponsor_name && !empty($request->sponsor_name) ) {

                    $sponsor = User::where('username', strtolower($request->sponsor_name))
                                    ->active()
                                    ->first();

                    if ( !$sponsor ) {
                        return redirect('/');
                    }

                    $referral_id = $sponsor->id;
                }

                $user = User::create([
                    'sponsor_id' => $referral_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'username' => $request->username,
                    'password' => bcrypt($request->password)
                ]);

                $address = Address::create([
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address'  => '',
                    'state'  => '',
                    'city'  => '',
                    'zip'  => ''
                ]);

                Payment::create([
                    'user_id'    => $user->id,
                    'address_id' => $address->id,
                    'payment_method_id' => 4, // Fund Transfer,
                    'reference_code' => '',
                    'amount' => $amount,
                ]);

                $referral->update([
                    'direct_recruits' => $referral->direct_recruits + 1
                ]);

                DB::commit();

                return redirect()->route('success', ['token' => md5(uniqid())]);
            } catch (\Exception $e) {
                dd($e);
                DB::rollback();
            }
        }

    	return view('auth.register', compact('referral', 'users'));
    }

    public function success($token)
    {
        return view('site.success');
    }

    public function beginners()
    {
        return view('beginners');
    }

    public function opportunities()
    {
        return view('opportunities');
    }

    public function products()
    {
        return view('products');
    }
}
