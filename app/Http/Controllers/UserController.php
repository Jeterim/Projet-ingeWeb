<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
     * Get information about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserProfile($id)
    {
        return view('editprofile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Get information and all posts about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserAndPostProfile($id)
    {
        $posts = DB::table('potins')
        ->join('users', 'users.id', '=', 'potins.user_id')
        ->get();

        return view('profile', ['user' => User::findOrFail($id),
                                'posts' => $posts]);
    }
}
