<?php

namespace App\Http\Controllers;


use Input;
use App\User;
use App\Post;
use App\Vote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteController extends Controller
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
    public function manager(Request $request)
    {
       $post_id=$request->id;
       $vote=$request->vote;

       $vote_number = 30;
       if($vote == -1)
       {
            $vote_number = 98;
       }

       return response()->json(array('id'=> $post_id, 'vote' => $vote_number), 200);
    }
}