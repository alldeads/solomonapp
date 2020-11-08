<?php

namespace App\Http\Livewire\Ecommerce\Checkout;

use Livewire\Component;

use App\Models\Cart;

class Items extends Component
{
	public $items;
	public $sub_total = 0;
	public $total = 0;

	public function mount($items)
	{
		$this->items = $items;
		$this->sub_total = Cart::getUserCartTotal();
		$this->total = Cart::getUserCartTotal();
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout.items');
    }
}
