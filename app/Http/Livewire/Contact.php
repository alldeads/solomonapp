<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Contact as ContactUs;

use Illuminate\Support\Facades\Validator;

class Contact extends Component
{
    public $input = [];

    public function create()
    {
        $validatedData = Validator::make($this->input, [
            'full_name' => 'required|min:3',
            'email'     => 'required|email',
            'subject'   => 'required|min:5',
            'message'   => 'required|min:10',
        ])->validate();

        ContactUs::create($this->input);

        session()->flash('status', [
            'message' => __('We have received your message, we will get back to you as soon as possible.'),
            'type'    => 'success',
            'label'   => 'Success!'
        ]);

        $this->emit('displayMessage');

        $this->input = [];
    }

    public function render()
    {
        return view('livewire.contact')
        		->extends('layouts.app')
        		->section('content');
    }
}