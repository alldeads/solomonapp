<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;

class History extends Component
{
	public $transactions;

	public function mount()
	{
		$this->transactions = auth()->user()->transactions;
	}

    public function render()
    {
        return view('livewire.transactions.history')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
