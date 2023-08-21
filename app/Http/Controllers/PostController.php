<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cloudinary; 

class PostController extends Controller
{
    public function index(Post $post){
        return view('index')->with(['posts'=> $post->get()]);
        $image_url = Cloudinary::getRealPath()->getSecurePath();
    }
}