<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'author',
        'published_date',
        'description',
        'image',
        'preview_link'
    ];
}
