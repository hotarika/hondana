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
            ->select('s.id', 's.user_id', 's.book_id', 'b.title', 'b.author', 'b.published_date', 'b.description', 'b.image', 'b.preview_link', 's.star', 's.read_at', 's.memo')
            ->leftJoin('books as b', 's.book_id', '=', 'b.id')
            ->get();

        return $books->toJson();
    }

    // 月毎の書籍数
    public function getBooksNum()
    {
        $books = DB::table('bookshelf as s')
            ->select(DB::raw('DATE_FORMAT(read_at, "%Y/%m") as read_at, COUNT(*) as count'))
            ->whereNotNull('read_at',)
            ->groupBy(DB::raw('DATE_FORMAT(read_at, "%Y/%m")'))
            ->get();

        return $books->toJson();
    }
}
