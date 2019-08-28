<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotUrl implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (strstr($value,'http://') || strstr($value,'https://')) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Запрещено вводить ссылки!';
    }
}
