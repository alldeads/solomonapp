<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Address;
use App\Models\Cart;
use App\Models\PaymentMethod;

class Checkout extends Component
{
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $address = "";
	public $state = "";
	public $city = "";
	public $zip = "";
	public $notes = "";
	public $address_id;
	public $addresses;
	public $items;
	public $sub_total = 0;
	public $total = 0;
	public $shipping_type;
	public $payment_options;
	public $payment_option;

	protected $rules = [
        'email'      => 'required|email',
        'first_name' => 'required|min:2',
        'last_name'  => 'required|min:2',
        'phone'      => 'required',
        'zip'        => 'required|numeric',
        'notes'      => 'nullable',
        'address'    => 'required',
        'state'      => 'required',
        'city'       => 'required',
        'payment_option' => 'required|numeric',
        'shipping_type' => 'required|numeric'
    ];

	public function mount()
	{
		$this->items = auth()->user()->carts;

		$this->sub_total = Cart::getUserCartTotal();
		$this->total = Cart::getUserCartTotal();
		$this->shipping_type  = 2;
		$this->payment_option = 1;
		$this->payment_options = PaymentMethod::active()->get();

		if ( count( auth()->user()->addresses ) > 0 ) {

			$this->addresses = auth()->user()->addresses;
			$address = auth()->user()->addresses[0];

			$this->first_name = $address->first_name;
			$this->last_name = $address->last_name;
			$this->phone = $address->phone;
			$this->email = $address->email;
			$this->address = $address->address;
			$this->state = $address->state;
			$this->city = $address->city;
			$this->zip = $address->zip;
			$this->notes = $address->notes;
			$this->address_id = $address->id;
		} else {
			$this->first_name = auth()->user()->first_name;
			$this->last_name = auth()->user()->last_name;
			$this->phone = auth()->user()->phone;
			$this->email = auth()->user()->email;
			$this->address_id = 0;
		}
	}

	public function updatedAddressId($address_id)
	{
		if ( $this->address_id > 0 ) {

			$address = Address::findOrFail($this->address_id);

			$this->first_name = $address->first_name;
			$this->last_name = $address->last_name;
			$this->phone = $address->phone;
			$this->email = $address->email;
			$this->address = $address->address;
			$this->state = $address->state;
			$this->city = $address->city;
			$this->zip = $address->zip;
			$this->notes = $address->notes;
		} else {

			$this->first_name = "";
			$this->last_name = "";
			$this->phone = "";
			$this->email = "";
			$this->address = "";
			$this->state = "";
			$this->city = "";
			$this->zip = "";
			$this->notes = "";
		}
	}

	public function saveAddress()
	{
		if ( count($this->items) == 0 ) {
			return redirect()->route('product');
		}

		$this->validate();

		DB::beginTransaction();

		try {
			if ( $this->address_id > 0 ) {
				$address = Address::updateOrCreate(
					[
						'user_id' => auth()->user()->id, 
						'id' => $this->address_id
					],
					[
						'first_name' => $this->first_name,
						'last_name'  => $this->last_name,
						'phone'  => $this->phone,
						'email'  => $this->email,
						'address'  => $this->address,
						'state'  => $this->state,
						'city'  => $this->city,
						'zip'  => $this->zip,
						'notes'  => $this->notes,
					]
				);
			} else {

				$address = Address::create([
					'user_id' => auth()->user()->id,
					'first_name' => $this->first_name,
					'last_name'  => $this->last_name,
					'phone'  => $this->phone,
					'email'  => $this->email,
					'address'  => $this->address,
					'state'  => $this->state,
					'city'  => $this->city,
					'zip'  => $this->zip,
					'notes'  => $this->notes,
				]);

			}

			$payment = Payment::create([
				'user_id' => auth()->user()->id,
				'address_id' => $address->id,
				'reference_code' => '',
				'amount' => $this->total,
			]);

			$order = Order::create([
				'user_id' => auth()->user()->id,
				'sub_total' => $this->sub_total,
				'total' => $this->total,
				'quantity' => Cart::getUserCartQuantity,
				'payment_id' => $payment_id
			]);

			foreach ($this->items as $value) {
				OrderDetails::create([
					'order_id' => $order->id,
					'product_name' => $value->product->name,
					'product_price' => $value->product->original_price,
					'product_quantity' => $value->quantity
				]);
			}

			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
		}
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
