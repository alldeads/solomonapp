<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class SliderContainer extends Component
{
	public $from;
	public $to;

	public function mount($from, $to)
	{
		$this->from = $from;
		$this->to   = $to;
	}

    public function render()
    {
        return view('livewire.partials.slider-container');
    }
}
