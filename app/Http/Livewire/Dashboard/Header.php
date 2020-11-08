<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\Cart;

class Header extends Component
{
	public $count = 0;

	protected $listeners = ['cartAdded' => 'refresh'];

	public function mount()
	{
		$this->count = Cart::getUserCartQuantity();
	}

	public function refresh($quantity)
	{
		$this->count += $quantity ;
	}

    public function render()
    {
        return view('livewire.dashboard.header');
    }
}
