<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

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
        return view('home');
    }

    public function profile(CreateReportRequest $request)
    {
        $user = auth()->user();

        // $validatedData = $request->validate([
        //     'first_name' => 'required|min:2',
        //     'last_name' => 'required|min:2',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'company' => 'nullable',
        //     'position' => 'nullable',
        //     'username' => 'required|min:4',
        // ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'position' => $request->position,
            'username' => $request->username
        ]);

        return view('dashboard.profile', compact('user'));
    }
}
