<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_name',
        'product_price',
        'product_price_m',
        'product_quantity'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
