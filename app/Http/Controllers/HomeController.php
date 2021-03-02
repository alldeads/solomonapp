<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;

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

        $data['network'] = User::count_user_downlines();

        $data['payment'] = Payment::where([
            'user_id' => auth()->id(),
            'type' => 'account'
        ])->where('status', '!=', 'received')->first();

        if ( count($user->payments->toArray()) == 0 && $user->status == "inactive" ) {
            return redirect()->route('referral', ['username' => $user->sponsor->username ?? 'solomon']);
        }

        return view('home', compact('user', 'data'));
    }
}
