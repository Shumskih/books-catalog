<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Aleksander Shumeiko',
        'email' => 'music.dll@mail.ru',
        'email_verified_at' => now(),
        'password' => '$2y$10$lp2z.1RnjNrRudJp15CBE.SRZg6bXC.VD4eDN1b8Wsbydt1vt4GHe', // password
        'remember_token' => Str::random(10),
    ];
});
