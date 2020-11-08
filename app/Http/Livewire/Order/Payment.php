<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

use App\Models\Order;

class Payment extends Component
{
	public $order;
	public $payment;

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
	}

    public function render()
    {
        return view('livewire.order.payment')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
