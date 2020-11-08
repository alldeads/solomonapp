<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'reference_code',
        'payment_type',
        'amount',
        'status'
    ];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}