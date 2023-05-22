<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordValidator implements Rule
{
    public function passes($attribute, $value)
    {
        // Validate the password criteria here
        $hasUppercase = preg_match('/[A-Z]/', $value);
        $hasLowercase = preg_match('/[a-z]/', $value);
        $hasNumber = preg_match('/[0-9]/', $value);
        $hasSpecialChar = preg_match('/[^a-zA-Z0-9]/', $value);

        $isValidLength = strlen($value) >= 8;

        return $hasUppercase && $hasLowercase && $hasNumber && $hasSpecialChar && $isValidLength;
    }

    public function message()
    {
        return 'The password must be at least 8 characters,contain at least one uppercase, lowercase letter,number, and special character.';
    }
}
