<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Order;
use App\Models\PaymentMethod;

class Payment extends Component
{
	public $order;
	public $payment;
	public $options;
	public $method;

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

    public function render()
    {
        return view('livewire.order.payment')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
