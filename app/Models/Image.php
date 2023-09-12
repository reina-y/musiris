<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    use HasFactory;
    protected $table ='images';
    protected $fillable = ['image_url','post_id'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
