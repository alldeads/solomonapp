<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

class First extends Component
{
	public $input = [];
	public $referral;

	public $show = "block";

	public function mount(User $referral)
	{
		$this->referral = $referral;
	}

	public function submit()
	{
		$validatedData = Validator::make($this->input, [
            'first_name' => 'required|min:3',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'username'   => 'required|unique:users',
            'password'   => 'required'
        ])->validate();

        $result = User::create_user($this->input, $this->referral);

        if ( $result !== false ) {
        	session()->flash('status', [
	            'message' => __('Account Information has been created!'),
	            'type'    => 'success',
	            'label'   => 'Success!'
	        ]);

        	$this->show = "none";

            $this->emit('proceedpackage', [
                'show' => 'block',
                'user' => $result
            ]);
        }

        session()->flash('status', [
            'message' => __('Something went wrong, please try again later!'),
            'type'    => 'error',
            'label'   => 'Oops!'
        ]);
	}

    public function render()
    {
        return view('livewire.registration.first');
    }
}
