<?php

namespace App\Http\Livewire\Point;

use Illuminate\Support\Facades\DB;

use Livewire\Component;

use App\Models\User;

class Single extends Component
{
	public $item;

	public function mount($item)
	{
		$this->item = $item;
	}

	public function redeem_item()
	{
		$points = auth()->user()->available_points;

		DB::beginTransaction();

		try {

			if ( $this->item->points > $points ) {
				session()->flash('itemerror', 'You are not eligible to redeem this item.');
				return;
			} else {

				auth()->user()->items()->create([
					'reference' => 'PS-' . time(),
					'item_id' => $this->item->id,
					'item_name' => $this->item->name,
					'item_points' => $this->item->points
				]);

				$user = User::find(auth()->id());

				$user->available_points -= $this->item->points;
				$user->save();

				session()->flash('itemsuccess', 'You have successfully redeemed the item.');
			}

			$this->emit('pointsRefreshed');

			DB::commit();

		} catch(\Exception $e) {
			DB::rollback();
			session()->flash('itemerror', 'Oops! Something went wrong, please try again!');
			return;
		}
	}

    public function render()
    {
        return view('livewire.point.single');
    }
}
