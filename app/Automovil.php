<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    public $incrementing = false;

    protected $table = 'automoviles';
    protected $primaryKey = 'patente';
    protected $fillable = ['patente', 'marca', 'modelo', 'version', 'color', 'valor', 'estado', 'imagen'];


    /**
     * Defino la relación automovil-cliente (un automóvil puede asociarse a muchos clientes)
     */
    public function alquileres ()
    {
        return $this->hasMany(Alquiler::class, 'id', 'id_alquiler');
    }


    /**
     * Determina si el automóvil se encuentra disponible para su alquiler o no
     */
    public function estaDisponible () {
        return $this->estado === 'disponible';
    }

}
