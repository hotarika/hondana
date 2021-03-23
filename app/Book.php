<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Google API から書籍を一時保存
     *
     * @var array
     */
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
