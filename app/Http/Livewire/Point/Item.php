<?php

namespace App\Http\Livewire\Point;

use Livewire\Component;

use App\Models\Item as Items;

class Item extends Component
{
	public $available_points;
	public $items;

	protected $listeners = ['pointsRefreshed' => 'refresh'];

	public function mount()
	{
		$this->available_points = auth()->user()->available_points;
		$this->items = Items::all();
	}

	public function refresh()
	{
		$this->available_points = auth()->user()->available_points;
		$this->items = Items::all();
	}

    public function render()
    {
        return view('livewire.point.item')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
