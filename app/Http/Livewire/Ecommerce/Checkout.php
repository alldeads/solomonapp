<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Address;
use App\Models\Cart;
use App\Models\PaymentMethod;
use App\Models\Payment;
use App\Models\Order;
use App\Models\User;
use App\Models\City;
use App\Models\OrderDetails;

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
	public $quantity;
	public $commissions = 0;
	public $city_id = 1;
	public $delivery_fee = 0;
	public $cities = [];

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
        'shipping_type' => 'required|string'
    ];

	public function mount()
	{
		$city = City::findOrFail($this->city_id);

		$this->items = auth()->user()->carts;
		$this->cities = City::where('status', 'active')->get();
		$this->delivery_fee = $city->fee;
		$this->quantity = Cart::getUserCartQuantity();
		$this->sub_total = Cart::getUserCartTotal();
		$this->total = Cart::getUserCartTotal() + $this->delivery_fee;
		$this->shipping_type  = "delivery";
		$this->payment_option = 1;
		$this->payment_options = PaymentMethod::active()
											->payment()
											->get();

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

		foreach ($this->items as $value) {
			$this->commissions += ($value->product->original_price - $value->product->members_price) * $value->quantity;
		}
	}

	public function updatedCityId($city_id)
	{
		$city = City::find($city_id);

		if ( !$city ) {
			session()->flash('checkouterror', 'Oops! Something went wrong, please try again.');
			exit;
		}

		$this->delivery_fee = $city->fee;
		$this->total = Cart::getUserCartTotal() + $this->delivery_fee;
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

			$user = User::find(auth()->user()->id);

			$payment = Payment::create([
				'user_id' => $user->id,
				'address_id' => $address->id,
				'payment_method_id' => $this->payment_option,
				'reference_code' => '',
				'amount' => $this->total,
			]);

			$order = Order::create([
				'reference' => 'S-' . time(),
				'user_id' => $user->id,
				'sub_total' => $this->sub_total,
				'total' => $this->total,
				'delivery_fee' => $this->delivery_fee,
				'quantity' => $this->quantity,
				'payment_id' => $payment->id,
				'shipping_type' => $this->shipping_type
			]);

			foreach ($this->items as $value) {
				OrderDetails::create([
					'order_id' => $order->id,
					'product_name' => $value->product->name,
					'product_price' => $value->product->original_price,
					'product_price_m' => $value->product->members_price,
					'product_quantity' => $value->quantity
				]);
			}

			Cart::clearUserCart();

			DB::commit();

			return redirect()->route('order.single', ['order_number' => $order->reference]);
			
		} catch (\Exception $e) {
			DB::rollBack();
			session()->flash('checkouterror', 'Oops! Something went wrong, please try again.');
		}
	}

    public function render()
    {
        return view('livewire.ecommerce.checkout')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
