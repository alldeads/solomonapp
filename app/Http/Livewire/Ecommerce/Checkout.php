<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class Checkout extends Component
{
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $address = "";
	public $state = "";
	public $city = "";
	public $zip = "";
	public $notes = "";

	protected $rules = [
        'email'      => 'required|email',
        'first_name' => 'required|min:2',
        'last_name'  => 'required|min:2',
        'phone'      => 'required',
        'zip'        => 'required|numeric',
        'notes'      => 'nullable',
        'address'    => 'required',
        'state'      => 'required',
        'city'       => 'required'
    ];

	public function mount()
	{
		$this->items = auth()->user()->carts;
		$this->first_name = auth()->user()->first_name;
		$this->last_name = auth()->user()->last_name;
		$this->phone = auth()->user()->phone;
		$this->email = auth()->user()->email;
	}

	public function saveAddress()
	{
		$this->validate();

		auth()->user()->addresses()->create([
			'first_name' => $this->first_name,
			'last_name'  => $this->last_name,
			'phone'  => $this->phone,
			'email'  => $this->email,
			'address'  => $this->address,
			'state'  => $this->state,
			'city'  => $this->city,
			'zip'  => $this->zip,
			'notes'  => $this->notes,
		]);
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
