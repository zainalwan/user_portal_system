<?php

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'max:255'],
            'user_name' => ['bail', 'required', 'unique:users,user_name', 'max:255'],
            'email' => ['bail', 'required', 'unique:users,email'],
            'password' => ['bail', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'min:8']
        ];
    }

    /**
     * Get error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.max' => 'Your name is too long.',
            'user_name.unique' => 'This user name has been used.',
            'user_name.max' => 'Your user name is too long',
            'email.unique' => 'This email has been used.',
            'password.regex' => 'Password should contain lowecase, uppercase, and number.',
            'password.min' => 'Your password is too short.'
        ];
    }
}
