<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;

use Illuminate\Support\Facades\Validator;

class Second extends Component
{
	public $listeners = ['proceedpackage' => 'proceedpackage'];

	public $input = [
		'package' => '',
		'amount'  => 1499,
		'option'  => ''
	];

	public $show = "none";
	public $user;

	public function mount()
	{
		$this->input['package'] = "starterpack-a";
	}

	public function proceedpackage($data)
	{
		$this->show = $data['show'];
		$this->user = $data['user'];
	}

	public function submit()
	{
		$validatedData = Validator::make($this->input, [
            'package'    => 'required',
            'option'     => 'required',
            'address'    => 'required'
        ])->validate();

		$this->emit('proceedpayment', [
            'show' => 'block',
            'data' => $this->input
        ]);
	}

    public function render()
    {
        return view('livewire.registration.second');
    }
}
