<?php

namespace App\Http\Controllers;


use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class PostController extends Controller
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
     * Create new post
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $req)
    {
        return redirect()->route('home')->with('message', 'Your post was sent!');
        
    }
}
