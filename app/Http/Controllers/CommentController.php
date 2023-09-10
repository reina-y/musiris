<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class CommentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post,Comment $comment,Request $request)
   {
        $movie = $request->file('movie_url');
        
        if ($movie) {
            $uploadedmovie = Cloudinary::upload($movie->getRealPath(), [
                'resource_type' => 'video',
            ]);
            $movieUrl = $uploadedmovie->getSecurePath();
        }

       $comment->post_id = $post->id;
       $comment->user_id = Auth::user()->id;
       $comment->body = $request['body'];
       $comment->movie_url = $movieUrl;
       $comment->save();

       return redirect('/post/'. $post->id);
   }
}
