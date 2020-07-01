<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Automovil;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Automovil::class, function (Faker $faker) {
    return [
        'patente' => $faker->unique()->regexify('[A-Z]{2,2}[0-9]{3,3}[A-Z]{2,2}'),
        'marca' => $faker->lastName,
        'modelo' => $faker->firstName,
        'version' => $faker->year,
        'color' => $faker->colorName,
        'valor' => $faker->numberBetween(80000, 500000),
        'estado' => 'disponible'
    ];
});
