<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\PaymentMethod;

use App\Models\Payment as Pay;

class Payment extends Component
{
	public $transaction;
	public $amount;
	public $pamount = 1499;
	public $date_paid;
	public $method;
	public $options;

	protected $rules = [
		'method'      => 'required',
        'transaction' => 'required|string',
        'amount'      => 'required|numeric',
        'date_paid'   => 'required|string'
    ];

    public function mount()
    {
    	$this->options = PaymentMethod::where('abbr', '!=', 'cod')->active()->get();
    	$this->method = 5;
    }

    public function submit_payment()
    {
    	$this->validate();

    	if ( $this->amount < $this->pamount) {
			session()->flash('accountpaymenterror', 'The amount is lesser than the total.');
			return;
		}

		if ( $this->date_paid > now()) {
			session()->flash('accountpaymenterror', 'The date is invalid.');
			return;
		}

    	$payment = Pay::updateOrCreate(
    		[
    			'user_id' => auth()->user()->id,
    			'type' => 'account'
    		],
    		[
    			'address_id' => auth()->user()->addresses[0]->id,
    			'reference_code' => $this->transaction,
    			'amount' => $this->pamount,
    			'status' => 'processing',
    			'date_paid' => $this->date_paid,
    			'payment_method_id' => $this->method
    		]
    	);

    	session()->flash('accountpaymentsuccess', 'This confirms your payment transaction. Your payment will be posted real-time.');

    	return;
    }

    public function render()
    {
        return view('livewire.account.payment')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
