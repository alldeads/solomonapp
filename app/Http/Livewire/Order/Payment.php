<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Order;
use App\Models\Payment as Pay;
use App\Models\PaymentMethod;

class Payment extends Component
{
	public $order;
	public $payment;
	public $options;
	public $method;

	public $transaction;
	public $amount;
	public $date_paid;

	protected $rules = [
		'method'      => 'required',
        'transaction' => 'required|string',
        'amount'      => 'required|numeric',
        'date_paid'   => 'required|string'
    ];

	public function mount($order_number)
	{
		$order = Order::where([
			'user_id' => auth()->user()->id,
			'reference' => $order_number
		])->first();

		if ( !$order ) {
			die;
		}

		$this->order = $order;
		$this->payment = $order->payment;
		$this->method = $order->payment->method->id;
		$this->options = PaymentMethod::where('abbr', '!=', 'cod')->active()->get();
	}

	public function submit_payment()
	{
		$this->validate();

		if ( $this->amount < $this->payment->amount) {
			session()->flash('paymenterror', 'The amount is lesser than the total.');
			return;
		}

		if ( $this->date_paid > now()) {
			session()->flash('paymenterror', 'The date is invalid.');
			return;
		}

		$payment = Pay::findOrFail($this->payment->id);

		$payment->payment_method_id = $this->method;
		$payment->date_paid = $this->date_paid;
		$payment->status = "processing";
		$payment->reference_code = $this->transaction;
		$payment->save();

		session()->flash('paymentsuccess', 'This confirms your payment transaction. Your payment will be posted real-time.');

		return;
	}

    public function render()
    {
        return view('livewire.order.payment')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
