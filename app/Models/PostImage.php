<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{

    protected $table = "posts_images";

    protected $fillable = ['post_id', 'path', 'original_name', 'mime_type', 'size'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
