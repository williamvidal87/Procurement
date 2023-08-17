<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        return [
        'required',
        'string',
        new Password,
        'confirmed',
        'required',
        'min:8',                // must be at least 8 characters in length
        'max:16',               // must be at least 16 characters in length
        'regex:/[a-z]/',        // must contain at least one lowercase letter
        'regex:/[A-Z]/',        // must contain at least one uppercase letter
        'regex:/[0-9]/',        // must contain at least one digit
        'regex:/[@$!%*#?&]/',   // must contain a special character,
        ];
    }
}
