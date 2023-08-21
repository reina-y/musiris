<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary; 

class PostController extends Controller
{
    public function index(Post $post){
        return view('index')->with(['posts'=> $post->get()]);
        //$image_url = Cloudinary::getRealPath()->getSecurePath();
    }
    public function show(Post $post){
        return view('show')->with(['posts'=> $post->get()]);
    }
}