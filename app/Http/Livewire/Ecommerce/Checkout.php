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
	public $municipality = "";
	public $city = "";
	public $zip = "";

	public function mount()
	{
		$this->first_name = auth()->user()->first_name;
		$this->last_name = auth()->user()->last_name;
		$this->phone = auth()->user()->phone;
		$this->email = auth()->user()->email;
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
