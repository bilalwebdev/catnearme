<?php

namespace App\Rules\Account;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordForbidden implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $forbiddenWords = config('cat.forbidden_words');

        foreach ($forbiddenWords as $word) {
            if (stripos($value, $word) !== false) {
                $fail(__('The password contains forbidden words ' . $word));
            }
        }
    }
}
