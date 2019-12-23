<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categorie;
use Faker\Generator as Faker;

$factory->define(Categorie::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
    ];
});
