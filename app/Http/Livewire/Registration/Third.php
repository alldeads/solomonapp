<?php

namespace App\Http\Livewire\Registration;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\Payment;
use App\Models\User;
use App\Models\Order;
use App\Models\PaymentMethod;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Third extends Component
{
	public $listeners = ['proceedpayment' => 'proceedpayment'];

	public $input = [
		'paid_amount' => '',
		'method'      => '',
		'reference'   => ''
	];

	public $data  = [];

	public $methods;

	public $show = "none";
	public $user;
	public $amount;

	public function mount()
	{
		$this->methods = PaymentMethod::where('activation', 1)->active()->get();
		$this->amount  = 1499;
	}

	public function submit()
	{
		$validatedData = Validator::make($this->input, [
            'paid_amount' => 'required',
            'method'      => 'required',
            'reference'   => 'required'
        ])->validate();

        if ( $this->input['paid_amount'] < $this->amount ) {
        	session()->flash('status', [
	            'message' => __('Amount must not less than the expected amount'),
	            'type'    => 'danger',
	            'label'   => 'Oops!'
	        ]);

	        return;
        }

        $user = User::find($this->user['id']);

        if ( !$user ) {
        	return redirect('/');
        }

        $payment = Payment::updateOrCreate(
    		[
    			'user_id' => $user->id,
    			'type' => 'account'
    		],
    		[
    			'address_id' => $user->addresses[0]->id,
                'mode' => $this->data['option'],
    			'reference_code' => $this->input['reference'],
    			'amount' => $this->amount,
    			'status' => 'processing',
                'package' => $this->data['package'],
    			'date_paid' => Carbon::now(),
    			'payment_method_id' => $this->input['method'],
    		]
    	);

        $params = [
            'package' => $this->data['package'],
            'option'  => $this->data['option'],
            'amount'  => $this->amount,
            'user'    => $user,
            'payment' => $payment
        ];

        Order::createItemsFromPackage($params);

    	if ( Auth::check() ) {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        Auth::login($user);
        request()->session()->regenerate();

       	return redirect()->intended('/home');
	}

	public function proceedpayment($data)
	{
		$this->show   = $data['show'];
		$this->user   = $data['user'];
		$this->data   = $data['data'];
		$this->amount = 1499;

		if ( $this->data['option'] == 'delivery') {
			$this->amount = 1499 + 150;
		}
		else if ( $this->data['option'] == 'shipping') {
			$this->amount = 1499 + 250;
		}
	}

	public function backToPackage()
	{	
		$this->emit('backpackage', [
            'show' => 'block',
            'data' => $this->data,
            'user' => $this->user
        ]);

        $this->show = "none";
	}

    public function render()
    {
        return view('livewire.registration.third');
    }
}
