<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'description' => $faker->paragraph(3, true),
        'num_of_pages' => random_int(100,1000)
    ];
});
