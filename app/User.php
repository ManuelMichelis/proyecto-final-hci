<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'email';

    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'api_token', 'type', 'legajo_empleado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Define la relacion usuario-empleado (un usuario del sistema se asocia a un único empleado)
     */

    public function empleado ()
    {
        return $this->hasOne(Empleado::class, 'legajo', 'legajo_empleado');
    }


    /**
     * Determina si una entidad usuario es de tipo Administrador.
     */
    public function esAdmin () {
        return $this->type === 'administrador';
    }

    /**
     * Determina si una entidad usuario es de tipo Vendedor.
     */
    public function esVendedor ()
    {
        return $this->type === 'vendedor';
    }

    /**
     * Determina si una entidad usuario es de tipo Repositor.
     */
    public function esRepositor ()
    {
        return $this->type === 'repositor';
    }

    public function rol () {
        $rol = $this->type;
        return ucfirst($rol);
    }


}
