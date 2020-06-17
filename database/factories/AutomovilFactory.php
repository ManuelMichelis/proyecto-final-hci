<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Automovil::class, function (Faker $faker) {
    return [
        'patente' => $faker -> unique() -> Str::random(7),
        'marca' => $faker -> name,
        'modelo' => $faker -> name,
        'version' => $faker -> year,
        'color' => $faker -> colorName
        // Revisar si no necesito agregar una restricción adicional para que 'patente' sea clave
    ];
});
