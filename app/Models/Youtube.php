<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'tag',
        'link',
        'type_new',
        'description',
        'content',
    ];
}
