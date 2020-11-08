<?php

namespace App\Http\Livewire\Point;

use Livewire\Component;

class Item extends Component
{
    public function render()
    {
        return view('livewire.point.item')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
