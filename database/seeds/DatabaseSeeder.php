<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        factory(\App\Models\Author::class, 5)->create();
        factory(\App\Models\Book::class, 9)->create();
        for ($i = 1; $i <= 9; $i++) {
            DB::table('author_book')->insert([
                'author_id' => random_int(1,5),
                'book_id' => random_int(1,9)
            ]);
        }

    }
}
