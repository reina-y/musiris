<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikedIndexController extends Controller
{
    public function liked(){
        $likedPosts = Auth::user()->likes()->with('post')->get();
        return view('musiris.likedIndex',compact('likedPosts'));
    }
}
