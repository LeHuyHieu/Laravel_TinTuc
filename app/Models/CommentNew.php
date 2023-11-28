<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentNew extends Model
{
    use HasFactory;
    protected $fillable = [
        'new_id',
        'comment_id',
        'user_id',
        'message',
    ];
}
