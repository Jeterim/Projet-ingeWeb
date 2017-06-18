<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function recharge()
    {
       return view('recharge');
    }

    public function addCredits(Request $req)
    {
        $user = Auth::user();
        $user->credits = $user->credits + 50;
        $user->save();
        return redirect()->route('home')->with('message','50 more credits have been credited ! ');
    }
}
