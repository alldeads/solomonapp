<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use App\Models\Cart;

class Single extends Component
{
	public $product;
	public $quantity;

	public function mount($product)
	{
		$this->product = $product;
		$this->quantity = 1;
	}

	public function add_to_cart()
	{
		$user = auth()->user();

		if ( $this->quantity < 1 ) {
			session()->flash('carterror', 'Invalid quantity.');
			return;
		}

		$cart = Cart::where(
			['user_id'  => $user->id, 'product_id' => $this->product->id]
		)->first();

		if ( !$cart ) {
			$user->carts()->create([
				'product_id' => $this->product->id,
				'quantity' => $this->quantity
			]);
		} else {
			$cart->update(['quantity' => $this->quantity + $cart->quantity]);
		}

		$this->emit('cartAdded');

		session()->flash('cartsuccess', 'Successfully added to cart.');
	}

    public function render()
    {
        return view('livewire.ecommerce.single');
    }
}
