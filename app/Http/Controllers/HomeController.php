<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('potins')
        ->select('potins.*', 'users.pseudo')
        ->leftJoin('users', 'users.id', '=', 'potins.user_id')
        ->orderBy('potins.id', 'desc')
        ->limit(5)
        ->get();
        return view('home', ['posts' => $posts]);
    }
}
