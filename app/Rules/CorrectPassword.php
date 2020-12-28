<?php

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CorrectPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $email = session('login_email');

        $user = DB::table('users')
              ->where('email', $email)
              ->first();

        if($user)
        {
            return Hash::check($value, $user->password);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please enter your valid password.';
    }
}
