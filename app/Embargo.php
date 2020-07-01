<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embargo extends Model
{
    public $incrementing = false;
    protected $table = 'embargos';
    protected $fillable = ['estado', 'legajo_repositor', 'id_alquiler_incumplido'];


    /**
     * Defino una relación alquiler-automovil (un alquiler involucra a un único automóvil)
     */
    public function repositorACargo ()
    {
        return $this->belongsTo(Empleado::class, 'legajo_repositor', 'legajo');
    }

    /**
     * Defino una relación alquiler-automovil (un alquiler involucra a un único automóvil)
     */
    public function alquilerAEmbargar ()
    {
        return $this->belongsTo(Alquiler::class, 'id_alquiler_incumplido', 'id');
    }

    /**
     *  Retorna la instancia de automóvil asociada al embargo
     */
    public function automovilARecuperar ()
    {
        $this->alquilerAEmbargar->automovil;
    }

    /**
     *  Retorna la instancia de cliente asociada al embargo
     */
    public function clienteAEmbargar ()
    {
        $this->alquilerAEmbargar->cliente;
    }

}
