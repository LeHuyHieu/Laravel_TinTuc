<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'comment_id',
        'user_id',
        'message',
    ];
}
