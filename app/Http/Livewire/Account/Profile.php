<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use App\Models\User;

use Illuminate\Validation\Rule;

class Profile extends Component
{
	public $user;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;
	public $company;
	public $position;
	public $username;
	public $referral;

	protected $rules = [
        'email'      => 'required|email',
        'first_name' => 'required|min:2',
        'last_name'  => 'required|min:2',
        'phone'      => 'required',
        'company'    => 'nullable',
        'position'   => 'nullable',
        'username'   => 'required'
    ];

	public function mount()
	{
		$this->user = auth()->user();
		$this->email = auth()->user()->email;
		$this->first_name = auth()->user()->first_name;
		$this->last_name = auth()->user()->last_name;
		$this->phone = auth()->user()->phone;
		$this->company = auth()->user()->company;
		$this->position = auth()->user()->position;
		$this->username = auth()->user()->username;
		$this->referral = auth()->user()->referral_link;
	}

	public function saveProfile()
	{
		$this->validate();

		$user = User::find($this->user->id);
		$email = strtolower($this->email);
		$username = strtolower($this->username);

		if ( $user->username != $username ) {
			if ( User::checkIfUsernameExists($username) ) {
				$this->username = $user->username;
				session()->flash('error', 'Username is already taken.');
				return;
			}
		}

        $user->first_name = ucfirst($this->first_name);
        $user->last_name = ucfirst($this->last_name);
        $user->email = $email;
        $user->phone = $this->phone;
        $user->company = $this->company;
        $user->position = $this->position;
        $user->username = $username;

        $user->save();

        session()->flash('message', 'Successfully updated.');
	}

    public function render()
    {
        return view('livewire.account.profile')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
