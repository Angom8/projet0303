<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function passes($attribute, $value)

    {

        return Hash::check($value, auth()->user()->password);

    }

   
    /**

     * Get the validation error message.

     *

     * @return string

     */

    public function message()

    {

        return 'The :attribute is match with old password.';

    }


}
