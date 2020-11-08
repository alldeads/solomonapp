<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class History extends Component
{
	public $orders;

	public function mount()
	{
		$this->orders = auth()->user()->orders;
	}

    public function render()
    {
        return view('livewire.order.history')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
