<?php

namespace App\Http\Livewire\Network;

use Livewire\Component;

use App\Models\User;

class Index extends Component
{
	public $downlines;
	public $level;
	public $list;
	public $count;

	public function mount()
	{
		$this->downlines = User::get_user_downlines();
		$this->list = isset($this->downlines[0]) ? $this->downlines[0] : [];
		$this->level = 0;
	}

	public function updatedLevel()
	{
		$this->downlines = User::get_user_downlines();

		if ( !isset($this->downlines[$this->level]) ) {
			$this->list = [];
			return;
		}

		$this->list = $this->downlines[$this->level];
	}

    public function render()
    {
        return view('livewire.network.index')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
