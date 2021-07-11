<?php

use App\User;
use App\Empleado;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = factory(User::class, 30)
            ->create()
            ->each(function($us) {
                $emp = factory(Empleado::class)->create();
                $legajo = $emp->legajo;
                $email = $us->email;
                $us->legajo_empleado = $legajo;
                $emp->email_usuario = $email;
                $emp->save();
            });
        foreach ($usuarios as $us) {
            $us->save();
        }
    }
}
