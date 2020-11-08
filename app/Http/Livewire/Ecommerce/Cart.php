<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use App\Models\Cart as Carts;

class Cart extends Component
{
	public $carts;

    protected $listeners = ['cartDeleted' => 'refresh'];

	public function mount()
	{
		$this->carts = auth()->user()->carts;

        if ( count($this->carts) == 0 ) {
            return redirect()->route('product');
        }
	}

    public function refresh($item)
    {
        $cart = Carts::destroy($item);

        $this->carts = auth()->user()->carts;

        $this->emit('cartAdded');
    }

    public function render()
    {
        return view('livewire.ecommerce.cart')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
