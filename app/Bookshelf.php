<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    protected $table = 'bookshelf';

    /**
     * 読書した書籍保存
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'book_id', 'star', 'read_at', 'memo'
    ];
}
