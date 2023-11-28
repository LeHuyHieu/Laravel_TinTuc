<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'comment_id',
        'is_read',
        'description',
        'main_content',
        'tag',
        'image_banner',
        'image',
        'content',
    ];
}
