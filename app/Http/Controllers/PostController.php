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

    /**
    * Send the deletion page
    *
    * @return \Illuminate\Http\Response
    **/
    public function buy($id) 
    {
        // $post = DB::table('potins')
        // ->where('potins.id', '=', $id)
        // ->limit(1)
        // ->get();
        return view('buy', [ 'post' => Post::findOrFail($id)]);
    }

    public function deletePost(Request $req, $id)
    {
        $user = Auth::user();
        if($user) {
            // Maybe not necessary
            $bd_user = User::findOrFail($user->id);
            // Check if user as enough credit
            if ($bd_user->credits > 10) {
                $message = 'OK';
                $bd_user->credits = $bd_user->credits - 10;
                Post::destroy($id);
                $bd_user->save();
             } else {
               $message = 'Not enough credit to buy this potin';  // Maybe also redirect to the page for recharging
            }
        } else {
            $message = 'problem';
        }
        return redirect()->route('home')->with('message', $message);
    }

}
