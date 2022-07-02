<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Card implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        // Length should be 16
        if (strlen($value) != 16)
            $fail(':attribute length should be equal to 16');

        // First digit should be either 4, 5 or 6
        if (!in_array((int)$value[0], [4, 5, 6]))
            $fail(':attribute first digit should be either 4, 5 or 6');

        // Parity check
        $sum = 0;
        for ($i = 0; $i < 16; $i++) {
            if ($i % 2)
                $sum += $value[$i];
            else
                $sum += ($value[$i] * 2 <= 9) ? ($value[$i] * 2) : ($value[$i] * 2 - 9);
        }

        if ($sum % 10)
            $fail('Invalid :attribute');
    }
}
