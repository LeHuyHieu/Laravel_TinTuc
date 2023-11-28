<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'tag',
        'category_id',
        'type_new',
        'image',
        'description',
        'main_content',
        'content',
    ];
}
