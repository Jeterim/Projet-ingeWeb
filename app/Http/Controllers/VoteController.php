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

       $vote_number_accept = 70;
       $vote_number_decline = 30;
       if($vote == -1)
       {
            $vote_number_accept = 32;
       	    $vote_number_decline = 68;
       }

       return response()->json(array('id'=> $post_id, 'vote_accept' => $vote_number_accept, 'vote_decline' => $vote_number_decline), 200);
    }
}
