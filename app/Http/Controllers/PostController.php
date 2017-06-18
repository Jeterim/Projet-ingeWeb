<?php

namespace App\Http\Controllers;


use App\User;
use App\Post;
use App\Comment;
use App\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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
     * get post from search quey
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPost(Request $query)
    {
        $this->validate($query, [
            'search-text' => 'required|min:3'
        ]);

        $posts = Post::where('content', 'like', '%'.$query->input('search-text').'%')->orderBy('id', 'DESC')->get();
        return view('search', ['query' => $query->input('search-text'), 'posts' => $posts]);
        
    }

    /**
     * get post from search quey
     *
     * @return \Illuminate\Http\Response
     */
    public function searchDate($date)
    {
        $posts = Post::where('created_at', 'like', $date.'%')->orderBy('id', 'DESC')->get();

        return view('search', ['query' => $date, 'posts' => $posts]);
        
    }

    /**
     * get post information
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostInfo($id)
    {
        $comments = Post::find($id)->comments->where('potin_id', $id);

        return view('postView', ['post' => Post::findOrFail($id), 'comments' => $comments]);

    }

    /**
     * get post page
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostPage()
    {
        $posts = Post::orderBy('id', 'DESC')->simplePaginate(10);
        return view('showPosts', ['posts' => $posts]);

        
    }

    /**
     * create new comment
     *
     * @return \Illuminate\Http\Response
     */
    public function createComment(Request $request, $id)
    {
         $this->validate($request, [
            'message' => 'required|max:300'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->potin_id = $id;
        $comment->content = $request->input("message");


        $message = 'There was an error';
        if ($request->user()->comments()->save($comment)) {
            $message = 'Comment successfully created!';
        }

        return redirect()->back()->with('message', $message);

    }

    /**
     * delete comment
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteComment($id)
    {
        $comment = Comment::where('id', $id)->first();
        if(!$comment) return redirect()->route('home')->with('message', 'This comment doesn\'t exist');
        if (Auth::id() != $comment->user_id) {
            return redirect()->back()->with('message', 'It is not your comment!');
        }
        $comment->delete();

        return redirect()->back()->with(['message' => 'Successfully deleted!']);

    }



    /**
     * Create new post
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
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
     * get post information (doublon ?)
     *
     * @return \Illuminate\Http\Response
     */
    public function geteditPost($id)
    {
        $post = Post::findOrFail($id);

        if(!$post) return redirect()->route('home')->with('message', 'This potin doesn\'t exist');
        if (Auth::id() != $post->user_id) {
            return redirect()->route('home')->with('message', 'It is not your potin!');
        }
        return view('postedit', ['post' => $post]);

    }


    /**
     * Edit a post
     *
     * @return \Illuminate\Http\Response
     */
    public function editPost(Request $request, $id)
    {
         $this->validate($request, [
            'message' => 'required|max:300'
        ]);
        $post = Post::findOrFail($id);
        if(!$post) return redirect()->route('home')->with('message', 'This potin doesn\'t exist');
        if (Auth::id() != $post->user_id) {
            return redirect()->route('home')->with('message', 'It is not your potin!');
        }
        $post->content = $request->input("message");
        $post->update();
        $message = 'Potin updated!';

        return redirect()->route('home')->with('message', $message);
    }

    /**
     * Delete a post
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUserPost($id)
    {
        $post = Post::where('id', $id)->first();
        if(!$post) return redirect()->route('home')->with('message', 'This potin doesn\'t exist');
        if (Auth::id() != $post->user_id) {
            return redirect()->back()->with('message', 'It is not your potin!');
        }
        $post->delete();
        return redirect()->route('home')->with(['message' => 'Successfully deleted!']);

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
                $message = 'Ce post a été supprimé';
                $bd_user->credits = $bd_user->credits - 10;
                $post = Post::findOrFail($id);
                //Notification
                $notif = new Notification();
                $notif->user_id = $post->user_id;
                $notif->data = " ".$post->content." has been deleted.";
                $notif->save();
                event(new \App\Events\PotinWasDeleted($post, $user, $message));
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

    /**
     * Edit a profile
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request, $id)
    {
         $this->validate($request, [
            'pseudo' => 'required|max:300',
            'nom' => 'required|max:300',
            'prenom' => 'required|max:300',
            'email' => 'required|max:300',
            'picture' => 'image'
        ]);

        $user = User::findOrFail($id);
        if(!$user) return redirect()->route('home')->with('message', 'This user doesn\'t exist');
        if (Auth::id() != $user->id) {
            return redirect()->route('home')->with('message', 'It is not your profile!');
        }

        if($request->hasFile('picture'))
        {
            if (!$request->file('picture')->isValid()) 
            {
                return redirect()->route('home')->with('message', 'Invalid file');
            }
            $imageName = $user->id . '.' . 
            $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move(base_path() . '/public/images/', $imageName);
            $user->picture = $imageName;
        } 

        $user->pseudo = $request->input("pseudo");
        $user->nom = $request->input("nom");
        $user->prenom = $request->input("prenom");
        $user->email = $request->input("email");
        $user->update();
        $message = 'Profile updated!';

        return back()->with('message', $message);
    }

    /**
     * Edit the password
     *
     * @return \Illuminate\Http\Response
     */
    public function editPassword(Request $request, $id)
    {
         $this->validate($request, [
            'oldpassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if(!Hash::check($request['oldpassword'], Auth::User()->password))
        {
            return back()->with('message', 'Your old password is not correct, try again !');
        }

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->input("password"));
        $user->update();
        $message = 'Password updated!';

        return back()->with('message', $message);
    }

    /**
     * Delete a profile
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteProfile(Request $request, $id)
    {
      $user = User::findOrFail($id);
      foreach($user->posts as $post)
      {
          $post->delete();
      }
      $user->delete();
      return redirect()->route('home')->with('message', "profile deleted !");
    }
}