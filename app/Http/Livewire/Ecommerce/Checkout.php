<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use App\Models\Address;

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
	public $address_id;
	public $addresses;
	public $items;

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

		if ( count( auth()->user()->addresses ) > 0 ) {

			$this->addresses = auth()->user()->addresses;
			$address = auth()->user()->addresses[0];

			$this->first_name = $address->first_name;
			$this->last_name = $address->last_name;
			$this->phone = $address->phone;
			$this->email = $address->email;
			$this->address = $address->address;
			$this->state = $address->state;
			$this->city = $address->city;
			$this->zip = $address->zip;
			$this->notes = $address->notes;
			$this->address_id = $address->id;
		} else {
			$this->first_name = auth()->user()->first_name;
			$this->last_name = auth()->user()->last_name;
			$this->phone = auth()->user()->phone;
			$this->email = auth()->user()->email;
			$this->address_id = 0;
		}
	}

	public function updatedAddressId($address_id)
	{
		if ( $this->address_id > 0 ) {

			$address = Address::findOrFail($this->address_id);

			$this->first_name = $address->first_name;
			$this->last_name = $address->last_name;
			$this->phone = $address->phone;
			$this->email = $address->email;
			$this->address = $address->address;
			$this->state = $address->state;
			$this->city = $address->city;
			$this->zip = $address->zip;
			$this->notes = $address->notes;
		} else {

			$this->first_name = "";
			$this->last_name = "";
			$this->phone = "";
			$this->email = "";
			$this->address = "";
			$this->state = "";
			$this->city = "";
			$this->zip = "";
			$this->notes = "";
		}
	}

	public function saveAddress()
	{
		$this->validate();

		if ( $this->address_id > 0 ) {

			$address = Address::updateOrCreate(
				[
					'user_id' => auth()->user()->id, 
					'id' => $this->address_id
				],
				[
					'first_name' => $this->first_name,
					'last_name'  => $this->last_name,
					'phone'  => $this->phone,
					'email'  => $this->email,
					'address'  => $this->address,
					'state'  => $this->state,
					'city'  => $this->city,
					'zip'  => $this->zip,
					'notes'  => $this->notes,
				]
			);
		} else {

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
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
