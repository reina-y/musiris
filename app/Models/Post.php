<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Searchable
{
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = ['user_id','title','image_url','instruments','body',];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
  {
    return $this->hasMany(Like::class);
  }
  public function islike($post)
  {
    $like=Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
    return $like;
  }
  public function getSearchResult(): SearchResult
    {
       $url = route('show',$this->id);
    
        return new SearchResult(
           $this,
           $this->title,
           $url
        );
    }    
    
}