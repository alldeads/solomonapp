<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests\CreateReportRequest;

use App\Models\Contact;
use App\Models\User;
use App\Models\Address;

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

    	if ( !$referral ) {
    		return redirect('/');
    	}

        if ( count($request->all()) > 0 ) {
            $validatedData = $request->validate([
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:2',
                'email' => 'required|email',
                'phone' => 'required',
                'username' => 'required|min:4',
                'password' => 'required|confirmed'
            ]);

            try {
                DB::beginTransaction();

                $user = User::create([
                    'sponsor_id' => $referral->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'username' => $request->username,
                    'password' => bcrypt($request->password)
                ]);

                Address::create([
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

                return redirect()->route('success', ['token' => md5(uniqid())]);
            } catch (\Exception $e) {
                DB::rollback();
            }
        }

    	return view('auth.register', compact('referral'));
    }

    public function success($token)
    {
        return view('site.success');
    }
}
