<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', // Tambahkan 'title' di sini
        'content',
        'image',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
