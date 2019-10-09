<?php

use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
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
        $this->deleteAndCreateDir();
        factory(\App\Models\Author::class, 15)->create();
        factory(\App\Models\Book::class, 27)->create();
        factory(User::class, 1)->create();
        factory(Role::class, 1)->create();
        for ($i = 1; $i <= 27; $i++) {
            DB::table('authors_books')->insert([
                'author_id' => random_int(1, 15),
                'book_id'   => random_int(1, 27),
            ]);
        }
        DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }

    private function deleteAndCreateDir()
    {
        if (file_exists('./public/uploads/')) {
            $this->emptyDir();
            array_map('rmdir', glob('./public/uploads/'));
            mkdir('./public/uploads/', 0777, true);
        } else {
            mkdir('./public/uploads/', 0777, true);
        }
    }

    private function emptyDir()
    {
        foreach (glob('./public/uploads/*') as $file) {
            unlink($file);
        }
    }
}
