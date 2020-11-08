<?php

namespace App\Http\Livewire\Point;

use Livewire\Component;

class Item extends Component
{
	public $available_points;

	public function mount()
	{
		$this->available_points = auth()->user()->available_points;
	}

    public function render()
    {
        return view('livewire.point.item')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
