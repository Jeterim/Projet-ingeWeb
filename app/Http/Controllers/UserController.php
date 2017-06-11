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
     * Get information and all posts about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserAndPost($id)
    {
        $posts = DB::table('potins')
        ->join('users', 'users.id', '=', 'potins.user_id')
        ->where('user_id', '=', $id)
        ->get();

        return view('profile', ['user' => User::findOrFail($id),
                                'posts' => $posts]);
    }

    /**
     * Get information about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditProfile($id)
    {
        return view('editprofile', ['user' => User::findOrFail($id)]);
    }
}
