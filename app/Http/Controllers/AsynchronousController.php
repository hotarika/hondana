<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsynchronousController extends Controller
{
    // 本棚の情報
    public function getBookshelf()
    {
        $books = DB::table('bookshelf as s')
            ->select('s.id', 's.user_id', 's.book_id', 'b.title', 'b.author', 'b.published_date', 'b.description', 'b.image', 'b.preview_link', 's.star', 's.read_at', 's.memo', 's.updated_at')
            ->leftJoin('books as b', 's.book_id', '=', 'b.id')
            ->get();

        return $books->toJson();
    }
}
