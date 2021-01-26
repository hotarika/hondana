<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bookshelf;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Carbon\Carbon;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookshelf.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $myShelf = DB::table('bookshelf')
            ->where('user_id', Auth::id())
            ->get();

        return view('bookshelf.create', compact('myShelf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books = DB::table('books')->where('id', $request->book_id)->first();

        if ($books === null) {
            $intoBook = new Book;
            $intoBook->fill([
                'id' => $request->book_id,
                'title' => $request->title,
                'author' => $request->author,
                'published_date' => $request->published_date,
                'description' => $request->description,
                'image' => $request->image,
                'preview_link' => $request->preview_link
            ])->save();
        }

        $myShelf = DB::table('bookshelf')
            ->where('user_id', Auth::id())
            ->where('book_id', $request->book_id)
            ->first();

        if ($myShelf === null) {
            $bookshelf = new Bookshelf;
            $bookshelf->fill([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
            ])->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = DB::table('bookshelf as s')
            ->select('s.id', 's.book_id', 'b.title', 'b.author', 'b.published_date', 'b.description', 'b.image', 'b.preview_link', 's.star', 's.read_at', 's.memo')
            ->leftJoin('books as b', 's.book_id', '=', 'b.id')
            ->where('s.id', $id)
            ->first();

        return view('bookshelf.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bookshelf')->where('id', $id)->delete();
    }
}
