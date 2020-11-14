<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'logo',
        'abbr',
        'status',
        'transaction'
    ];

    public function scopeActive($query)
    {
        $query->where('status', 'active');
    }

    public function scopeTransaction($query)
    {
        $query->where('transaction', true);
    }

    public function scopeNotTransaction($query)
    {
        $query->where('transaction', false);
    }
}
