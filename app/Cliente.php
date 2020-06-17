<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'patente';
    public $incrementing = false;


    /**
     * Defino la relación cliente-automovil (un cliente puede asociarse a muchos automóviles)
     */
    public function automoviles ()
    {
        return $this->belongsToMany('App\Automovil', 'alquileres', 'id_cliente', 'patente_automovil')
            ->withPivot('fecha_inicio', 'fecha_expiracion', 'costo');
    }
}
