<?php

namespace App\Http\Livewire\Transactions;

use Livewire\Component;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\User;

class Cash extends Component
{
	public $methods;
	public $commission;
	public $user;
	public $amount;
	public $full_name;
	public $account_name;
	public $account_number;
	public $phone_number;
	public $bank = 'bdo';
	public $option = 6; //Cash

	public function mount()
	{
		$this->user = auth()->user();
		$this->full_name = $this->user->full_name;
		$this->phone_number = $this->user->phone;
		$this->commission = $this->user->commission;
		$this->methods = PaymentMethod::active()->transaction()->get();
	}

	public function submit_cash_out()
	{
		$this->validate();

		if ( $this->amount > $this->commission ) {
			session()->flash('cashouterror', 'Oops! Insufficient balance.');
			return;
		}

		if ( $this->amount < 0 ) {
			session()->flash('cashouterror', 'Oops! Amount must be greater than zero.');
			return;
		}

		$name = $this->full_name ?? $this->account_name;

		try {

			DB::beginTransaction();

			Transaction::create([
				'user_id'   => $this->user->id,
				'reference' => rand(),
				'full_name' => $name,
				'amount' => $this->amount,
				'phone' => $this->phone_number,
				'account_number' => $this->account_number,
				'payment_method_id' => $this->option,
				'bank' => $this->bank,
			]);

			$user = User::findOrFail($this->user->id);

			$user->commission -= $this->amount;
			$user->save();

			$this->commission = $user->commission;

			DB::commit();

			session()->flash('cashoutsuccess', 'We have received your cash out request successfully!');
		} catch ( \Exception $e ) {
			DB::rollBack();
			session()->flash('cashouterror', 'Oops! Something went wrong, please try again!');
		}

		return;
	}

	public function rules()
	{
		return [
			'option'    => 'required||in:'  . implode(',', [4,6,7,8]),
			'amount'    => 'required|integer',
			'full_name' => Rule::requiredIf($this->option != 4),
			'bank'      => Rule::requiredIf($this->option == 4),
			'account_name'   => Rule::requiredIf($this->option == 4),
			'account_number' => 'required_with:account_name',
			'phone_number'   => 'required',
		];
	}

    public function render()
    {
        return view('livewire.transactions.cash')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
