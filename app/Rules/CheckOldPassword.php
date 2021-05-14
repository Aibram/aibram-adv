<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckOldPassword implements Rule
{
    protected $userPassword;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $userPassword)
    {
        $this->userPassword = $userPassword;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->userPassword);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.password_match');
    }
}
