<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embargo extends Model
{
    public $incrementing = false;
    protected $table = 'embargos';
    protected $fillable = ['estado', 'legajo_repositor', 'id_alquiler_incumplido'];


    /**
     * Defino una relación alquiler-vehículo (un alquiler involucra a un único automóvil)
     */
    public function repositorACargo ()
    {
        return $this->belongsTo(Empleado::class, 'legajo_repositor');
    }

    /**
     * Defino una relación alquiler-vehículo (un alquiler involucra a un único automóvil)
     */
    public function alquilerIncumplido ()
    {
        return $this->belongsTo(Alquiler::class, 'id_alquiler_incumplido');
    }

    /**
     *  Retorna la instancia de vehículo asociada al embargo
     */
    public function vehiculoARecuperar ()
    {
        return $this->alquilerIncumplido->vehiculo;
    }

    /**
     *  Retorna la instancia de cliente asociada al embargo
     */
    public function clienteInvolucrado ()
    {
        return $this->alquilerIncumplido->cliente;
    }

}
