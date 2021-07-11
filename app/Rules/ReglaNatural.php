<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaNatural implements Rule
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
        if (is_numeric($value)) {
            return $value > 0;
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
        return 'Se requiere que el valor del :attribute sea un numérico y natural (mayor a 0)';
    }
}
