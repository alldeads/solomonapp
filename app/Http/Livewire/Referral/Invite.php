<?php

namespace App\Http\Livewire\Referral;

use Livewire\Component;

class Invite extends Component
{
	public $link;

	public function mount()
	{
		$this->link = auth()->user()->referral_link;
	}

    public function render()
    {
        return view('livewire.referral.invite')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
