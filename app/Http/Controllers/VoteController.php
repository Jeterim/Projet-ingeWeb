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
       	$vote_type=$request->vote;
        $user_id = Auth::id();
	$credits = User::find($user_id);
	$to_pay = 1;

	if($credits->credits - 1 >= 0)
	{
   		$user_vote = Vote::where('potin_id','=',$post_id)->where('user_id', '=', $user_id)->first();

		if($user_vote)
   		{
			if($vote_type == $user_vote->vote_type)
			{
				$to_pay = 0;
			}
			else
			{
				$user_vote->vote_type=$vote_type;
				$user_vote->save();
			}
   		}
   		else
   		{
       			$new_vote = new Vote();
	  		$new_vote->vote_type=$vote_type;
			$new_vote->user_id=$user_id;
			Post::findOrFail($post_id)->votes()->save($new_vote);
   		}
		if($to_pay)
		{
			$credits->credits=$credits->credits - 1;
			$credits->save();
		}
	}

	$vote_number_accept=Post::find($post_id)->votes()->where('vote_type','=','1')->count();
	$vote_number_decline=Post::find($post_id)->votes()->where('vote_type','=','-1')->count();

       	return response()->json(array('id'=> $post_id, 'vote_accept' => $vote_number_accept, 'vote_decline' => $vote_number_decline, 'credits'=>$credits->credits), 200);
    }
}
