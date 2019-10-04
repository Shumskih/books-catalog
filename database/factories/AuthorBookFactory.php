<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'author_id' => function () {
            return Author::all()->random();
        },
        'book_id'   => function () {
            return Book::all()->random();
        },
    ];
});
