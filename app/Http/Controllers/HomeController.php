<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

use App\Models\Item;
use App\Models\Order;

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

        $data['this_month'] = Order::get_monthly_income(now());
        $data['last_month'] = Order::get_monthly_income('last month');

        $items = Item::where('points', '<=', $user->available_points)->get();
        $rewards = count($items);

        $claimed_rewards = count(auth()->user()->items()
                                ->where('status', 'received')
                                ->get());
        $data['claimed_rewards'] = $claimed_rewards;

        return view('home', compact('user', 'data', 'rewards'));
    }
}
