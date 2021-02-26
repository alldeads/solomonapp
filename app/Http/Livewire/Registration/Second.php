<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;

use Illuminate\Support\Facades\Validator;

class Second extends Component
{
	public $listeners = [
		'proceedpackage' => 'proceedpackage',
		'backpackage'    => 'backpackage'
	];

	public $input = [
		'package' => '',
		'option'  => '',
		'address' => ''
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

	public function backpackage($data)
	{
		$this->show  = $data['show'];
		$this->user  = $data['user'];
		$this->input = $data['data'];
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
            'data' => $this->input,
            'user' => $this->user
        ]);

        $this->show = "none";
	}

    public function render()
    {
        return view('livewire.registration.second');
    }
}
