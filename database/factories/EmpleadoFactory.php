<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'localidad' => $faker->city,
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->phoneNumber,
    ];
});
