<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cron extends Model
{
    protected $primaryKey = 'command';
    protected $fillable = ['command', 'next_run', 'last_run'];

    /**
     * Evalúa si corresponde verificar existencia de alquileres expirados sin devolución para emitir embargos,
     * dependiendo de si se ha cumplido o no un intervalo de tiempo de 15 minutos.
     */
    public static function testearPorEmbargos($comando, $minutos) {
        $cron = Cron::find($comando);
        $now  = now();
        // Si existe un testeo Cron programado y NO se cumplieron 15 minutos de espera, no debo testear
        if ($cron != null && $cron->next_run > $now->timestamp) {
            return false;
        }
        // En caso contrario, debo hacerlo
        Cron::updateOrCreate(
            ['command'  => $comando],
            ['next_run' => now()->addMinutes($minutos)->timestamp,
             'last_run' => now()->timestamp]
        );
        return true;
    }

}
