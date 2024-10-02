<?php

namespace App\Rules;

use App\Models\User;
use Closure;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth; // Ensure this import is correct
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
        // Retrieve the authenticated user
        $user = User::find(auth()->user()->id);

        // Check if the provided current password matches the stored hashed password
        return $user && Hash::check($value, $user->password);
    }

    // This method is required by the Rule interface
    public function message()
    {
        return 'The current password is incorrect.';
    }

    // Implementing the validate method
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (!$this->passes($attribute, $value)) {
            $fail($this->message());
        }
    }
}