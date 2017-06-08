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
     * get post information
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostInfo($id)
    {
        $comments = Post::find(1)->comments->where('potin_id', $id);
        return view('postView', ['post' => Post::findOrFail($id), 'comments' => $comments]);
        
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

    /**
     * Delete a post
     *
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $post = Post::where('id', $id)->first();
        if(!$post) return redirect()->route('home')->with('message', 'This potin doesn\'t exist');
        if (Auth::id() != $post->user_id) {
            return redirect()->back()->with('message', 'It is not your potin!');
        }
        $post->delete();
        return redirect()->route('home')->with(['message' => 'Successfully deleted!']);
        
    }


}