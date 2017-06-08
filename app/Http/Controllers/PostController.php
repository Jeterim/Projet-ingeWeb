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
    public function createPost(Request $request)
    {

         //print_r($request->all());
         //echo $request->input("_token");

         $this->validate($request, [
            'message' => 'required|max:300'
        ]);

        $post = new Post();
        $post->content = $request->input("message");
        

        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }

        return redirect()->route('home')->with('message', $message);
        
    }
}