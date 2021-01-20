<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 'DPz3DwAAQBAJ',
            'title' => 'はらぺことらたとふしぎなクレヨン',
            'authors' => '山田太郎',
            'published_date' => '2021/01/20',
            'description' => 'DPz3DwAAQBAJの説明です',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('books')->insert([
            'id' => 'skR0k0VY8aAC',
            'title' => 'カタカナアイウエオ',
            'authors' => '山田太郎',
            'published_date' => '2021/01/20',
            'description' => 'skR0k0VY8aACの説明です',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('books')->insert([
            'id' => 'P8RtQgAACAAJ',
            'title' => 'M78ウルトラマンのカタカナアイウエオ',
            'authors' => '山田太郎',
            'published_date' => '2021/01/20',
            'description' => 'P8RtQgAACAAJの説明です',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
