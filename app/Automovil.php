<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    protected $table = 'automoviles';
    protected $primaryKey = 'patente';
    public $incrementing = false;


    /**
     * Defino la relación automovil-cliente (un automóvil puede asociarse a muchos clientes)
     */
    public function clientes ()
    {
        return $this->belongsToMany('App\Alquiler', 'pagas', 'patente_automovil', 'id_cliente')
            ->withPivot('fecha_inicio', 'fecha_expiracion', 'costo');
        // Agrego a la tabla de la relación ALQUILERES tres atributos adicionales
    }


}
