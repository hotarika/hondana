<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if (Auth::id() !== 1) {
            // Google APIを格納しているテーブルの不要な書籍を削除
            $books =    DB::table('books as b')
                ->select('b.id as book_id', 's.id as bookshelf_id')
                ->leftJoin('bookshelf as s', 'b.id', '=', 's.book_id')
                ->get();

            foreach ($books as $key => $book) {
                if ($book->bookshelf_id === null) {
                    DB::table('books')->where('id', $book->book_id)->delete();
                }
            }

            // 退会処理
            DB::table('users')->where('id', Auth::id())->delete();
            DB::table('bookshelf')->where('user_id', Auth::id())->delete();
        }

        return redirect('edit/profile');
    }
}
