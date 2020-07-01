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
        return $this->hasMany(Alquiler::class, 'id', 'id_alquiler');
    }


    public function embargos ()
    {
        return $this->hasMany(Embargo::class, 'id', 'id_embargo');
    }


}
