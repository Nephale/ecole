<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Professeur;
use Faker\Generator as Faker;

$factory->define(Professeur::class, function (Faker $faker) {
    return [
        'nom' => $faker->sentence(2, true),
        'prenom' => $faker->sentence(2, true),
        'email' => $faker->email,
        'year' => $faker->year,
        'description' => $faker->paragraph(),
    ];
});
