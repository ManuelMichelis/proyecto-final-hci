<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaDinero implements Rule
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
        if (is_float($value) || is_numeric($value))
        {
            return $value >= 0;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor de costo debe ser un valor real no negativo';
    }
}
