<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alphabet;
use Faker\Generator as Faker;

$factory->define(Alphabet::class, function (Faker $faker) {
    return [
        'letter' => [
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
        ],
    ];
});
