<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 

class PostController extends Controller
{
    public function index(Post $post){
        return view('index')->with(['posts'=> $post->get()]);
        $image_url = Cloudinary::getRealPath()->getSecurePath();
    }
    public function show(Post $post){
        return view('show')->with(['post'=> $post]);
    }
    public function create(){
        return view('create');
    }
    public function store(Post $post,Request $request){
        $user_id = Auth::id();
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url, 'user_id' => $user_id];
        $post->fill($input)->save();
        return redirect('/');
    }
}