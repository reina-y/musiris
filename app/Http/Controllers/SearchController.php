<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class SearchController extends Controller
{
    public function result(Post $post,  Request $request)
    {
        $searchResults = (new Search())
                    ->registerModel(Post::class, ['title','instruments','body'])
                    ->perform($request->input('query'));
        return view('search.result', compact('searchResults'))->with(['post'=>$post]);
    }
}
