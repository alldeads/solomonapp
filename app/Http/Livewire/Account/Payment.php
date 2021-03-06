<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;

use Carbon\Carbon;

use App\Models\PaymentMethod;
use App\Models\Address;

use App\Models\Payment as Pay;

class Payment extends Component
{
	public $transaction;
	public $amount;
	public $pamount = 1499;
	public $date_paid;
	public $method;
    public $package;
    public $mode;
    public $address;
	public $options;

	protected $rules = [
        'mode'        => 'required',
		'method'      => 'required',
        'package'     => 'required',
        'transaction' => 'required|string',
        'amount'      => 'required|numeric',
        'date_paid'   => 'required|string',
        'address'     => 'nullable'
    ];

    public function mount()
    {
    	$this->options = PaymentMethod::where('activation', 1)->active()->get();
    	$this->method = 3;
        $this->package = "starterpack-a";
        $this->mode    = "pick-up";
    }

    public function updatedMode($mode)
    {
        if ( $mode == "pick-up" ) {
            $this->pamount = 1499 + 0;
        } else if ($mode == "delivery") {
            $this->pamount = 1499 + 150;
        } else {
            $this->pamount = 1499 + 250;
        }
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

        $address = Address::find(auth()->user()->addresses[0]->id);

        if ( !$address ) {
            session()->flash('accountpaymenterror', 'There was something went wrong!');
            return;
        }

        if ( $this->mode != "pick-up" && empty($this->address) ) {
            session()->flash('accountpaymenterror', 'Address is required!');
            return;
        }

        if ( $this->mode != "pick-up" ) {
            $address->address = $this->address;
            $address->save();
        }

    	$payment = Pay::updateOrCreate(
    		[
    			'user_id' => auth()->user()->id,
    			'type' => 'account'
    		],
    		[
    			'address_id' => $address->id,
                'mode' => $this->mode,
    			'reference_code' => $this->transaction,
    			'amount' => $this->pamount,
    			'status' => 'processing',
                'package' => $this->package,
    			'date_paid' => $this->date_paid,
    			'payment_method_id' => $this->method
    		]
    	);

    	return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.account.payment')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
