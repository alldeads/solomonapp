<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{
	public $full_name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'full_name' => 'required|min:3',
        'email'     => 'required|email',
    ];

    public function saveReport()
    {
    	$this->validate();

    	// try {
    	// 	session()->flash('success', 'Successfully submitted!');
    	// } catch (\Exception $e) {
    	// 	session()->flash('error', 'Something went wrong!');
    	// }
    }

    public function render()
    {
        return view('livewire.contact')
        		->extends('layouts.app')
        		->section('content');;
    }
}