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
        'shipping_fee',
        'type'
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

    public static function createItemsFromPackage($params)
    {
        $package = $params['package'] ?? 'starterpack-a';

        $fee    = 0;
        $sub    = $params['amount'];
        $option = 'pick-up';

        if ( $params['option'] != 'pick-up' ) {
            $fee = $params['amount'] - 1499;
            $sub = $params['amount'] - $fee;
            $option = 'delivery';
        }

        $order = Order::create([
            'reference'      => 'S-' . time(),
            'user_id'        => $params['user']->id,
            'sub_total'      => $sub,
            'total'          => $params['amount'],
            'shipping_fee'   => $fee,
            'quantity'       => 1,
            'payment_id'     => $params['payment']->id,
            'shipping_type'  => $option,
            'type'           => 'package'
        ]);

        if ( $params['package'] == 'starterpack-a' ) {
            $products = [
                '8' => 1, // Royalty Scent Queen
                '9' => 1, // Royalty Scent King
                '6' => 2, // Turmeric Oil
                '7' => 2, // Eucalyptus Oil
                '1' => 1, // Charcoal Soap
                '2' => 1, // Calamansi Soap
                '3' => 1, // Carrot Soap
                '4' => 1, // Tomato Soap
                '5' => 1, // Peppermint Soap
            ];
        }

        else if ( $params['package'] == 'starterpack-b' ) {
            $products = [
                '6' => 7, // Turmeric Oil
                '7' => 7, // Eucalyptus Oil
            ];
        }

        else if ( $params['package'] == 'starterpack-c' ) {
            $products = [
                '6' => 3, // Turmeric Oil
                '7' => 3, // Eucalyptus Oil
                '1' => 2, // Charcoal Soap
                '2' => 2, // Calamansi Soap
                '3' => 2, // Carrot Soap
                '4' => 2, // Tomato Soap
                '5' => 2, // Peppermint Soap
            ];
        }

        else {
            $products = [
                '8' => 3, // Royalty Scent Queen
                '9' => 2, // Royalty Scent King
            ];
        }

        $count = 0;


        foreach ($products as $key => $value) {
            $product = Product::findOrFail($key);

            OrderDetails::create([
                'order_id'         => $order->id,
                'product_id'       => $product->id,
                'product_price'    => $product->members_price,
                'product_quantity' => $value
            ]);

            $count += $value;
        }

        $order->update(['quantity' => $count]);
    }
}
