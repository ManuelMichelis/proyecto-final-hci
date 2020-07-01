<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'fecha_inicio', 'fecha_expiracion', 'costo', 'patente_automovil', 'nro_cliente', 'id_embargo_asociado',
    ];

    /**
     * Defino una relación alquiler-automovil (un alquiler involucra a un único automóvil)
     */
    public function automovil ()
    {
        return $this->belongsTo(Automovil::class, 'patente_automovil', 'patente');
    }

    /**
     * Defino una relación alquiler-automovil (un alquiler involucra a un único automóvil)
     */
    public function cliente ()
    {
        return $this->belongsTo(Cliente::class, 'nro_cliente', 'nro');
    }

    /**
     * Defino una relación alquiler-empleado (un alquiler puede ser arreglado por un único empleado)
     */
    public function vendedorACargo ()
    {
        return $this->belongsTo(Empleado::class, 'legajo_vendedor', 'legajo');
    }

    /**
     * Defino una relación alquiler-empleado (un alquiler puede requerir un embargo por un único empleado)
     */
    public function embargoAsociado ()
    {
        return $this->hasOne(Embargo::class, 'id', 'id_embargo_asociado');
    }

}
