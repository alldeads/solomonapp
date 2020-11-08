<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use App\Models\Cart;

class Item extends Component
{
	public $item;
	public $product_name;
	public $product_price;
	public $product_avatar;
	public $quantity;
	public $total;

	public function mount($item)
	{
		$this->item = $item;
		$this->product_name = $item->product->name;
		$this->product_avatar = $item->product->avatar;
		$this->product_price = $item->product->original_price;
		$this->quantity = $item->quantity;
		$this->total = $this->product_price * $this->quantity;
	}

	public function updatedQuantity($quantity)
	{
		$this->total = $this->product_price * $this->quantity;

		$cart = Cart::find($this->item->id);

		$cart->quantity = $this->quantity;
		$cart->save();

		$this->emit('cartAdded');
	}

	public function delete_cart()
	{
		$this->emit('cartDeleted', $this->item->id);
	}

    public function render()
    {
        return view('livewire.ecommerce.item');
    }
}
