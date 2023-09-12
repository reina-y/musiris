<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Cloudinary;
use App\Models\Image;

class PostController extends Controller
{
    public function index(Post $post){
        $user = auth()->user();
        $posts = Post::withCount('likes')->orderByDesc('updated_at')->get();
        return view('musiris.index')->with(['posts' => $posts,]);
    }
    public function show(Post $post,Comment $comment){
        return view('musiris.show')->with(['post'=> $post,'comments'=> $comment->get()]);
    } 
    public function create(){
        return view('musiris.create');
    }
    public function store(Post $post,PostRequest $request){
        $user_id = Auth::id();
        $input = $request['post'];
        $input += ['user_id' => $user_id];
        $post->fill($input)->save();
        // 画像の保存
        foreach($request->file('image') as $url)
        {
            $image = new Image();
            $image_url = Cloudinary::upload($url->getRealPath())->getSecurePath();
            $image->image_url = $image_url;
            $image->post_id = $post->id;
            $image->save();
        }
        return redirect('/');
    }
    public function user(Post $post,User $user){
        $posts = $post->where('user_id', $user->id);
        return view('musiris.user')->with(['posts'=> $posts->get(),'users'=> $user]);
    }
    public function edit(Post $post)
    {
        return view('musiris.edit')->with(['post'=>$post]);
    } 
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        foreach($request->file('image') as $url)
        {
            $image = new Image();
            $image_url = Cloudinary::upload($url->getRealPath())->getSecurePath();
            $image->image_url = $image_url;
            $image->post_id = $post->id;
            $image->save();
        }

        return redirect('/');
    }
    public function delete(Post $post)
    {
        $post->delete();
        
        return redirect('/');
    }
    public function like (Post $post, Request $request) {
        $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
        $post_id = $request->post_id; // 投稿のidを取得
        // すでにいいねがされているか判定するためにlikesテーブルから1件取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); 

        if (!$already_liked) { 
            $like = new Like; // Likeクラスのインスタンスを作成
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            // 既にいいねしてたらdelete 
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        // 投稿のいいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); // JSONデータをjQueryに返す
    }
}