<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaNombre implements Rule
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
        $cumpleFormato = preg_match('/[A-Z]{1,}|[a-z]{1,}/', $value);
        return !$vacio && $cumpleFormato;        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El nombre de :attribute debe ser alfabético y estar conformado por al menos un caracter';
    }
}
