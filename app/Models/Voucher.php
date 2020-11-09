<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'name',
        'user_id',
        'points'
    ];

    public function scopeAvailable($query)
    {
    	$query->where('status', 'available');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
