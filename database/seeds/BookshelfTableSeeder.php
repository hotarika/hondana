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
            'star' => 4,
            'memo' => 'これはメモです',
            'created_at' => Carbon::now(),
            'updated_at' => '2021-01-01 16:22:19',
        ]);
        DB::table('bookshelf')->insert([
            'user_id' => 1,
            'book_id' => 'skR0k0VY8aAC',
            'star' => 3,
            'memo' => 'これはメモ2です',
            'created_at' => Carbon::now(),
            'updated_at' => '2021-01-10 16:22:19',

        ]);
        DB::table('bookshelf')->insert([
            'user_id' => 1,
            'book_id' => 'P8RtQgAACAAJ',
            'star' => 2,
            'memo' => 'これはメモ3です',
            'created_at' => Carbon::now(),
            'updated_at' => '2021-01-20 16:22:19',

        ]);
    }
}
