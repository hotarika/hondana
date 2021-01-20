<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BookshelfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookshelf')->insert([
            'user_id' => 1,
            'book_id' => 'DPz3DwAAQBAJ',
            'memo' => 'これはメモです',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bookshelf')->insert([
            'user_id' => 1,
            'book_id' => 'skR0k0VY8aAC',
            'memo' => 'これはメモ2です',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('bookshelf')->insert([
            'user_id' => 1,
            'book_id' => 'P8RtQgAACAAJ',
            'memo' => 'これはメモ3です',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
