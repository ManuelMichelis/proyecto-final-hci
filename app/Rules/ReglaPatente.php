<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaPatente implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $vacio = empty(trim($value));
        //dd('Voy a evaluar la expresión regular para patentes');
        $cumpleFormato = preg_match("/[A-Z]{2}\d{3}[A-Z]{2}|[A-Z]{3}\d{3}/", $value);
        return !$vacio && $cumpleFormato;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El formato de la :attribute debe ser LLLDDD o LLDDDLL (L=mayúscula y D=dígito)';
    }

}
