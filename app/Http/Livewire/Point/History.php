<?php

namespace App\Http\Livewire\Point;

use Livewire\Component;

class History extends Component
{
	public $items;

	public function mount()
	{
		$this->items = auth()->user()->items;
	}

    public function render()
    {
        return view('livewire.point.history')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
