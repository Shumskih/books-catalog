<?php

use App\Alphabet;
use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    private $alphabet
        = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
        ];

    private $users = [];

    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        factory(\App\Models\Author::class, 15)->create();
        factory(\App\Models\Book::class, 27)->create();
        factory(Role::class, 1)->create();
        for ($i = 1; $i <= 27; $i++) {
            DB::table('authors_books')->insert([
                'author_id'  => random_int(1, 15),
                'book_id'    => random_int(1, 27),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->createAdmin();
        $this->createUser();
        foreach ($this->users as $u) {
            DB::table('users')->insert([
                'name'              => $u->name,
                'email'             => $u->email,
                'email_verified_at' => $u->email_verified_at,
                'password'          => $u->password,
                'remember_token'    => $u->remember_token,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
        DB::table('users_roles')->insert([
            'user_id'    => 1,
            'role_id'    => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        foreach ($this->alphabet as $letter) {
            DB::table('alphabets')->insert([
                'letter'     => $letter,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function createAdmin()
    {
        $admin                    = new User();
        $admin->name              = 'Admin';
        $admin->email             = 'admin@mail.ru';
        $admin->email_verified_at = now();
        $admin->password          = bcrypt('iamadmin');
        $admin->remember_token    = Str::random(10);

        array_push($this->users, $admin);
    }

    private function createUser()
    {
        $user                    = new User();
        $user->name              = 'User';
        $user->email             = 'user@mail.ru';
        $user->email_verified_at = now();
        $user->password          = bcrypt('iamuser');
        $user->remember_token    = Str::random(10);

        array_push($this->users, $user);
    }
}
