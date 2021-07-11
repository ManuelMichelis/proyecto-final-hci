<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'legajo';


    protected $fillable = [
        'nombre', 'apellido', 'direccion', 'localidad', 'telefono', 'email_usuario',
    ];

    /**
     * Define la relacion empleado-usuario (un empleado tiene una un único usuario o cuenta en sistema)
     */

    public function user ()
    {
        return $this->belongsTo(User::class, 'email_usuario', 'email');
    }


    public function alquileres ()
    {
        return $this->hasMany(Alquiler::class, 'legajo_vendedor', 'legajo');
    }


    public function embargos ()
    {
        return $this->hasMany(Embargo::class, 'legajo_repositor', 'legajo');
    }

    public function nombreCompleto () {
        return $this->nombre." ".$this->apellido;
    }


}
