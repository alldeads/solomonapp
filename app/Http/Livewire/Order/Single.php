<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Order;

class Single extends Component
{
	public $order;
	public $order_details;
	public $payment;
	public $address;
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

		$this->address = $order->payment->address;
		$this->order = $order;
		$this->payment = $order->payment;
		$this->method = $order->payment->method->abbr;
		$this->order_details = $order->order_details;
	}

    public function render()
    {
        return view('livewire.order.single')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
