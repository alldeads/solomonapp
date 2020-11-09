<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;

use App\Models\Voucher;
use App\Models\User;

class Index extends Component
{
	public $voucher;

	public function validateVoucher()
	{
		$result = Voucher::where('name', $this->voucher)->available()->first();

		if ( !$result ) {
			session()->flash('vouchererror', 'Oops! Invalid voucher code.');
			return;
		}

		$user = User::findOrFail(auth()->user()->id);

		$user->available_points += 10;

		$user->save();

		$result->update([
			'status' => 'used',
			'user_id' => $user->id
		]);

		session()->flash('vouchersuccess', 'You have successfully used the voucher.');
	}

    public function render()
    {
        return view('livewire.voucher.index')
        		->extends('layouts.dashboard')
        		->section('content');
    }
}
