<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

class Password extends Component
{
	public $old_password;
	public $new_password;
	public $password_confirmation;

	protected $rules = [
		'old_password' => 'required',
        'new_password' => 'required|min:6'
    ];

    public function change_password()
    {
    	$this->validate();

    	$user = auth()->user();

    	if ( !Hash::check($this->old_password, $user->password) ) {
    		session()->flash('passworderror', 'Your old password is incorrect!');
			return;
    	}

    	$user->update(['password' => Hash::make($this->new_password)]);
    	
    	$this->new_password = "";
    	$this->old_password = "";

    	session()->flash('passwordsuccess', 'Password successfully changed!');
    }

    public function render()
    {
        return view('livewire.account.password')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
