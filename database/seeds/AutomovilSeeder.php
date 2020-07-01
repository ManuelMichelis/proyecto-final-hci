<?php

use Illuminate\Database\Seeder;
use App\Automovil;

class AutomovilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Automovil::class, 22)->create();
    }
}
