<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaImagen implements Rule
{

    const FORMATOS_VALIDOS = [
        'jpeg',
        'png',
        'jpg',
        'bmp',
        'svg',
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /*
        dd(file_exists($value));
        dump($attribute);
        dd($value);
        die;
        */
        $extension = null;
        $formatoValido = false;
        if ($value != null) {
            $extension = $value->extension();
            $formatoValido = in_array($extension, self::FORMATOS_VALIDOS);            
        }
        return $value != null && $formatoValido;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Se debe adjuntar un archivo con un formato de imagen soportado por la aplicación (.png, .jpg, .jpeg, .bmp o .svg)';
    }
}
