<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombre' => $faker -> name,
        'apellido' => $faker -> name,
        'localidad' => $faker -> name,
        'direccion' => $faker -> name,
        'telefono' => $faker -> phoneNumber,
    ];
});
