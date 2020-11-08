<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'user_id',
        'sub_total',
        'total',
        'quantity',
        'status',
        'payment_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function payment()
    {
    	return $this->hasOne(Payment::class);
    }

    public function order_details()
    {
    	return $this->hasMany(OrderDetails::class);
    }
}
