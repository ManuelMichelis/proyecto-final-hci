<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App;

class EvaluarExpiraciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sunshine:eval_exp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica cuáles alquileres en Sunshine están vencidos y sin devolución, para crear el embargo correspondiente';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $stringFecha = now()->format('Y-m-d H:i:s');
        // Obtengo alquileres vencidos, sin devolución, y que no tienen una orden de embargo asociada
        $alquileres = App\Alquiler::where('estado_al_cierre', 'sin devolucion')
                    ->whereNull('id_embargo_asociado')
                    ->whereDate('fecha_expiracion','<=',$stringFecha)
                    ->get();
        // Obtengo todos los usuarios de tipo 'repositor'
        $usuariosRepo = App\User::where('type', 'repositor')->get();
        // Por cada alquiler obtenido con ests
        foreach ($alquileres as $alq) {
            $repositor = $usuariosRepo->random()->empleado;
            $embargo = new App\Embargo;
            $embargo->estado = 'pendiente';
            $embargo->legajo_repositor = $repositor->legajo;
            $embargo->id_alquiler_incumplido = $alq->id;
            $id_emb = $embargo->save();
            $alq->id_embargo_asociado = $id_emb;
            $alq->save();
        }
    }
}
