<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'nro';

    public $incrementing = true;

    protected $fillable = [
        'DNI', 'nombre', 'apellido', 'localidad', 'direccion', 'nacionalidad', 'telefono', 'email', 'id_alquiler',
    ];


    public function nombreCompleto () {
        return $this->nombre." ".$this->apellido;
    }

    /**
     * Defino la relación cliente-automovil (un cliente puede asociarse a muchos automóviles)
     */
    public function alquileres ()
    {
        return $this->hasMany(Alquiler::class, 'nro_cliente', 'nro');
    }

}
