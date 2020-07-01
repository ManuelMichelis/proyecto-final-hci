<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Empleado;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Registro un nuevo empleado
        $empleado = Empleado::create([
            'nombre' => $data['name'],
            'apellido' => $data['apellido'],
            'localidad' => $data['localidad'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
        ]);

        // Registro la nueva cuenta de usuario
        $usuario = User::create([
            'email' => $data['email'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
        ]);

        // Asocio el mail de la cuenta de usuario con el mail del empleado
        $empleado->email_usuario = ($usuario->email);
        // Guardo el empleado para que le sea asignado su id.
        $empleado->save();
        // Asocio la cuenta de usuario al empleado creado previamente
        $usuario->legajo_empleado = ($empleado->legajo);

        $usuario->save();
        $empleado->save();

        return $usuario;
    }
}
