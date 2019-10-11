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
        $this->deleteAndCreateOrCreateUploadsDir();
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

    private function deleteAndCreateOrCreateUploadsDir()
    {
        $fileName = '.'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
        $removeDirScript = '.'.DIRECTORY_SEPARATOR.'rust'.DIRECTORY_SEPARATOR.'remove_dir.exe';
        $createDirScript = '.'.DIRECTORY_SEPARATOR.'rust'.DIRECTORY_SEPARATOR.'create_dir.exe';

        if (file_exists($fileName)) {
            exec($removeDirScript);
            exec($createDirScript);
        } else {
            exec($createDirScript);
        }
    }
}
