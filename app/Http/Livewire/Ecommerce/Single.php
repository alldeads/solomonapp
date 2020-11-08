<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class Single extends Component
{
	public $product;
	public $quantity = 1;

	public function mount($product)
	{
		$this->product = $product;
	}

	public function add_to_cart()
	{
		
	}

    public function render()
    {
        return view('livewire.ecommerce.single');
    }
}
