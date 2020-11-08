<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;
use App\Models\Product as Products;

class Product extends Component
{
	public $products;

	public function mount()
	{
		$this->products = Products::all();
	}

    public function render()
    {
        return view('livewire.ecommerce.product')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
