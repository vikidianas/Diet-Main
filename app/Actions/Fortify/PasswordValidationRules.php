<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

// use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),
            'confirmed',
        ];
    }
}
