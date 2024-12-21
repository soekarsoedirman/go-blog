<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'author_name',
        'comment',
        'blog_id',
    ];
    
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
