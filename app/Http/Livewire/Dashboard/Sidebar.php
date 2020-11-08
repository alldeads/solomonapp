<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\Product;

class Sidebar extends Component
{
	public $products;

	public function mount()
	{
		$this->products = count(Product::all());
	}

    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}
