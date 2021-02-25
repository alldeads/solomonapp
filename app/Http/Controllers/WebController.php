<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        return view('index');
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
                'username'      => 'required|min:4|unique:users',
                'password'      => 'required|confirmed',
                'sponsor_name'  => 'nullable',
            ]);

            try {
                DB::beginTransaction();

                $referral_id = $referral->id;

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

                $referral->update([
                    'direct_recruits' => $referral->direct_recruits + 1
                ]);

                DB::commit();

                if ( Auth::check() ) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                }

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $request->session()->regenerate();

                    return redirect()->intended('account/payment');
                }

                return redirect()->route('success', ['token' => md5(uniqid())]);
            } catch (\Exception $e) {

                session()->flash('registererror', 'Oops! There was an error, please try again!');

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
