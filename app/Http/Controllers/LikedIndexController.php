<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikedIndexController extends Controller
{
    public function likedIndex(){
        $likedPosts = Auth::user()->likes()->with('post')->paginate(3);
        return view('musiris.likedIndex',compact('likedPosts'));
    }
}
