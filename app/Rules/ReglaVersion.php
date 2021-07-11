<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReglaVersion implements Rule
{
    const VERSION_PISO = 1920;

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
            return $value >= self::VERSION_PISO && $value <= date("Y");
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
        return 'El año de versión debe ser un valor de año válido (entre '.self::VERSION_PISO.' y '.date("Y").')';
    }
}
