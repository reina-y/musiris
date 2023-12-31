<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Models\Image;

class Post extends Model implements Searchable
{
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = ['user_id','title','instruments','body',];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
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
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
}