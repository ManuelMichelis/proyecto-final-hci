<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'DNI' => $faker->unique()->regexify('[1-9][0-9]*$'),
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'localidad' => $faker->city,
        'direccion' => $faker->streetAddress,
        'nacionalidad' => 'United States',
        'telefono' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
