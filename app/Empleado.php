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
        return $this->hasOne(User::class, 'email', 'email_usuario');
    }


    public function alquileres ()
    {
        return $this->hasMany('App\Alquiler', 'gestion_alquileres', 'legajo_vendedor', 'id_alquiler');
    }


    public function embargos ()
    {
        return $this->hasMany('App\Alquiler', 'embargos', 'legajo_repositor', 'id_alquiler');
    }


}
