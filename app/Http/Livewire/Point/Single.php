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

    public function render()
    {
        return view('livewire.point.single');
    }
}
