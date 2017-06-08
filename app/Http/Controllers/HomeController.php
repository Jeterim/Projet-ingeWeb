<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
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
        // $posts = DB::table('posts')
        // ->join('users', 'users.id', '=', 'posts.user_id') // da fuck, ou l'id d'un post est le meme que celui de l'auteur ?
        // ->limit(5)
        // ->get();
        // echo($posts);

       return view('home', ['posts' => Post::all()->sortByDesc('id')]);
    }
}
