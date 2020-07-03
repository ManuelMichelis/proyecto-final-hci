<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(AutomovilSeeder::class);

        // Creo cuatro alquileres y un embargo pendiente

        // Obtengo cuatro clientes y automóviles al azar
        $clientesAlq = App\Cliente::all()->random(4);
        $autosAlq = App\Automovil::all()->random(4);

        // Primer alquiler: al borde de la orden de embargo
        $alquiler1 = new App\Alquiler;
        $alquiler1->fecha_inicio = now()->modify('- 2 days');
        $alquiler1->fecha_expiracion = now()->modify('+ 1 minutes');
        $alquiler1->costo = 2100;
        $alquiler1->estado_al_cierre = 'sin devolucion';
        $alquiler1->save();
        $auto1 = $autosAlq->get(0);
        $cliente1 = $clientesAlq->get(0);
        $alquiler1->cliente()->associate($cliente1);
        $alquiler1->automovil()->associate($auto1);
        $auto1->estado = 'adquirido';
        $alquiler1->save();
        $auto1->save();

        // Segundo alquiler: con devolución recién efectuada. Sin embargo
        $alquiler1 = new App\Alquiler;
        $alquiler1->fecha_inicio = now()->modify('- 3 days');
        $alquiler1->fecha_expiracion = now();
        $alquiler1->costo = 2000;
        $alquiler1->estado_al_cierre = 'con devolucion';
        $alquiler1->save();
        $auto1 = $autosAlq->get(1);
        $cliente1 = $clientesAlq->get(1);
        $alquiler1->cliente()->associate($cliente1);
        $alquiler1->automovil()->associate($auto1);
        $auto1->estado = 'disponible';
        $alquiler1->save();
        $auto1->save();

        // Tercer alquiler: próximo a finalizar, sin devolución aún. Con posibilidad de cerrarlo.
        $alquiler1 = new App\Alquiler;
        $alquiler1->fecha_inicio = now()->modify('- 4 days');
        $alquiler1->fecha_expiracion = now()->modify('- 50 minutes');
        $alquiler1->costo = 1900;
        $alquiler1->estado_al_cierre = 'sin devolucion';
        $alquiler1->save();
        $auto1 = $autosAlq->get(2);
        $cliente1 = $clientesAlq->get(2);
        $alquiler1->cliente()->associate($cliente1);
        $alquiler1->automovil()->associate($auto1);
        $auto1->estado = 'adquirido';
        $alquiler1->save();
        $auto1->save();

        // Creación del embargo único para el tercer alquiler: pendiente de finalizar
        $repositores = App\User::where('type', 'repositor')->get();
        $repositor = $repositores->random()->empleado;
        $embargo = new App\Embargo;
        $embargo->estado = 'pendiente';
        $embargo->legajo_repositor = $repositor->legajo;
        $embargo->id_alquiler_incumplido = $alquiler1->id;
        $id_emb = $embargo->save();
        $alquiler1->id_embargo_asociado = $id_emb;
        $alquiler1->save();

        // Cuarto alquiler: recién efectuado, con cuatro días de duración.
        $alquiler1 = new App\Alquiler;
        $alquiler1->fecha_inicio = now();
        $alquiler1->fecha_expiracion = now()->modify('+ 4 days');
        $alquiler1->costo = 2000;
        $alquiler1->estado_al_cierre = 'sin devolucion';
        $alquiler1->save();
        $auto1 = $autosAlq->get(3);
        $cliente1 = $clientesAlq->get(3);
        $alquiler1->cliente()->associate($cliente1);
        $alquiler1->automovil()->associate($auto1);
        $auto1->estado = 'adquirido';
        $alquiler1->save();
        $auto1->save();

    }
}
