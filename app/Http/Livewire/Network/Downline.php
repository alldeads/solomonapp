<?php

namespace App\Http\Livewire\Network;

use Livewire\Component;

class Downline extends Component
{
	public $user;

	public function mount($user)
	{
		$this->user = $user;
	}

    public function render()
    {
        return view('livewire.network.downline');
    }
}
