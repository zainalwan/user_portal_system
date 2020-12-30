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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AccountRecovery;

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
            if(!Hash::check($value, $user->password))
            {
                $date_time = new \DateTime($user->last_try);
                $delta_time = time() - $date_time->getTimestamp();

                if($delta_time < 30)
                {
                    DB::table('users')
                        ->where('email', $email)
                        ->update([
                            'try_count' => $user->try_count + 1,
                            'last_try' => date('Y-m-d H:i:s')
                        ]);
                }
                else
                {
                    DB::table('users')
                        ->where('email', $email)
                        ->update([
                            'try_count' => 1,
                            'last_try' => date('Y-m-d H:i:s')
                        ]);
                }

                if(DB::table('users')
                   ->where('email', $email)
                   ->first()
                   ->try_count == 10)
                {
                    do
                    {
                        $password_reset_token = Str::random(60);
                    }
                    while(DB::table('users')->where('password_reset_token', $password_reset_token)->first());
                    DB::table('users')
                        ->where('email', $email)
                        ->update([
                            'active' => -1,
                            'password_reset_token' => $password_reset_token
                        ]);

                    Mail::to($user->email)
                        ->send(new AccountRecovery($user->name, $password_reset_token));
                }
                return false;
            }

            DB::table('users')
                ->where('email', $email)
                ->update([
                    'try_count' => 0,
                    'last_try' => date('Y-m-d H:i:s')
                ]);
            return true;
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
