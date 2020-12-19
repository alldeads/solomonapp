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
        'shipping_type',
        'delivery_fee'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }

    public function order_details()
    {
    	return $this->hasMany(OrderDetails::class);
    }

    public static function get_monthly_income($date)
    {
        $month_num = date('m', strtotime($date));
        $year_num = date('Y', strtotime($date));

        $data['monthly_gross']  = 0;
        $data['monthly_profit'] = 0;

        $orders = Order::whereMonth('created_at', $month_num)
                        ->whereYear('created_at', $year_num)
                        ->where('status', '!=', 'pending')
                        ->get();

        foreach ($orders as $order) {
            $data['monthly_gross'] += $order->total;

            foreach ($order->order_details as $detail) {
                $profit = ($detail->product_price - $detail->product_price_m) * $detail->product_quantity;

                $data['monthly_profit'] += $profit;
            }
        }

        return $data;
    }
}
