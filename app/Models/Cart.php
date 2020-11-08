<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public static function getUserCartQuantity()
    {
    	$carts = auth()->user()->carts;
    	$count = 0;

    	foreach ($carts as $cart) {
    		$count += $cart->quantity;
    	}

    	return $count;
    }
}
