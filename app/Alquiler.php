<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';


    /**
     * Defino una relación alquiler-empleado (un alquiler puede ser arreglado por un único empleado)
     */
    public function vendedor ()
    {
        return $this->belongsTo('App\Empleado', 'gestion_alquileres', 'id_alquiler', 'legajo_vendedor');
    }


    /**
     * Defino una relación alquiler-empleado (un alquiler puede requerir un embargo por un único empleado)
     */
    public function repositor ()
    {
        return $this->belongsTo('App\Empleado', 'embargos', 'id_alquiler', 'legajo_repositor');
    }

}
