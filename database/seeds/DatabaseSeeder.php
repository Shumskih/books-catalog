<?php

use App\Custom\Services\RustScripts\RustScriptFactory;
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
        $rustScripts = RustScripts::factory();
        if (!$rustScripts->isScriptsExists()) {
            $rustScripts->compile();
        }
        //        factory(\App\Models\Author::class, 15)->create();
        //        factory(\App\Models\Book::class, 27)->create();
        //        factory(User::class, 1)->create();
        //        factory(Role::class, 1)->create();
        //        for ($i = 1; $i <= 27; $i++) {
        //            DB::table('authors_books')->insert([
        //                'author_id' => random_int(1, 15),
        //                'book_id'   => random_int(1, 27),
        //            ]);
        //        }
        //        DB::table('users_roles')->insert([
        //            'user_id' => 1,
        //            'role_id' => 1,
        //        ]);
    }

    private function deleteAndCreateOrCreateUploadsDirLinux()
    {
        $fileName        = sprintf(".%spublic%suploads%s", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR);
        $removeDirScript = sprintf(".%srust%sremove_dir", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
        $createDirScript = sprintf(".%srust%screate_dir", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);

        if (file_exists($fileName)) {
            exec($removeDirScript);
            exec($createDirScript);
        } else {
            exec($createDirScript);
        }
    }

    private function deleteAndCreateOrCreateUploadsDirWindows()
    {
        $fileName        = sprintf(".%spublic%suploads%s", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR);
        $removeDirScript = sprintf(".%srust%sremove_dir.exe", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
        $createDirScript = sprintf(".%srust%screate_dir.exe", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);

        if (file_exists($fileName)) {
            exec($removeDirScript);
            exec($createDirScript);
        } else {
            exec($createDirScript);
        }
    }
}
