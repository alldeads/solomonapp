<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $month_num = date('m', strtotime(now()));
        $year_num = date('Y', strtotime(now()));

        $data['monthly_gross']  = 0;
        $data['monthly_profit'] = 0;

        $orders = $user->orders()
                        ->whereMonth('created_at', $month_num)
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

        $items = Item::where('points', '<=', $user->available_points)->get();
        $rewards = count($items);

        $claimed_rewards = count(auth()->user()->items()
                                ->where('status', 'received')
                                ->get());
        $data['claimed_rewards'] = $claimed_rewards;

        return view('home', compact('user', 'data', 'rewards'));
    }
}
