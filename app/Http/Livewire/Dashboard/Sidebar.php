<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\Models\Product;
use App\Models\Item;
use App\Models\User;

class Sidebar extends Component
{
	public $products;
	public $points;
	public $downlines;

	public function mount()
	{
		$this->products = count(Product::all());
		$this->points = count(Item::where('points', '<=', auth()->user()->available_points)->get());
		$this->downlines = User::count_user_downlines();
	}

    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}
