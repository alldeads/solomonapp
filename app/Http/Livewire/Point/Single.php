<?php

namespace App\Http\Livewire\Point;

use Livewire\Component;

class Single extends Component
{
	public $item;

	public function mount($item)
	{
		$this->item = $item;
	}

	public function redeem_item()
	{
		$points = auth()->user()->available_points;

		if ( $this->item->points > $points ) {
			session()->flash('itemerror', 'You are not eligible to redeem this item.');
			return;
		} else {
			session()->flash('itemsuccess', 'You have successfully redeemed the item.');
		}
	}

    public function render()
    {
        return view('livewire.point.single');
    }
}
