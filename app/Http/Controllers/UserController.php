<?php

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserAccountRequest;
use App\Http\Requests\AuthenticateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Mail\EmailVerification;
use App\Mail\DeleteAccountConfirmation;

class UserController extends Controller
{
    /**
     * Send email verification mail
     *
     * @return void
     */
    private function sendEmailVerificationMail($email, $name, $email_verification_token)
    {
        Mail::to($email)
            ->send(new EmailVerification($name, $email_verification_token));
    }

    /**
     * Send delete account confirmation mail
     *
     * @return void
     */
    private function sendDeleteAccountConfirmationMail($email, $name, $delete_account_token)
    {
        Mail::to($email)
            ->send(new DeleteAccountConfirmation($name, $delete_account_token));
    }

    /**
     * Showing registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Store a newly user account.
     *
     * @param  \App\Http\Requests\StoreUserAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAccountRequest $request)
    {
        $validated = $request->validated();

        $user = new User;
        $user->name = $validated['name'];
        $user->user_name = $validated['user_name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->active = 0;
        do
        {
            $user->email_verification_token = Str::random(60);
        }
        while(User::where('email_verification_token', $user->email_verification_token)->first());
        $user->save();

        $user = User::where('user_name', $user->user_name)->first();
        $ticket = [
            'id' => $user->id,
            'name' => $user->name,
            'user_name' => $user->user_name,
            'email' => $user->email,
        ];
        $request->session()->put('_ticket', $ticket);

        $this->sendEmailVerificationMail($user->email, $user->name, $user->email_verification_token);

        return redirect('/');
    }

    /**
     * Show login form
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Perform authentication process
     *
     * @param  \App\Http\Requests\AuthenticateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(AuthenticateUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])
              ->first();

        $ticket = [
            'id' => $user->id,
            'name' => $user->name,
            'user_name' => $user->user_name,
            'email' => $user->email,
        ];
        $request->session()->put('_ticket', $ticket);
        $request->session()->forget('login_email');

        return redirect('/');
    }

    /**
     * Show guide for verifying email
     *
     * @return \Illuminate\Http\Response
     */
    public function verify()
    {
        return view('user.verify_email');
    }

    /**
     * Resend email verification mail
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resendEmailVerificationMail(Request $request)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);
        $this->sendEmailVerificationMail($user->email,
                                         $user->name,
                                         $user->email_verification_token);

        return redirect('/verify')->with('notif', 'New verification email has been sent.');
    }

    /**
     * Perform account activation action
     *
     * @param  $emali_verification_token
     * @return \Illuminate\Http\Response
     */
    public function activateAccount($email_verification_token)
    {
        $user = User::where('email_verification_token', $email_verification_token)
              ->first();
        if(!$user)
        {
            abort(404);
        }

        $user->active = 1;
        $user->email_verification_token = null;
        $user->save();
        return redirect('/');
    }

    /**
     * Show change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('user.change_password');
    }

    /**
     * Perform update password action
     *
     * @param  \App\Http\Requests\UpdatePasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect('/change_password')->with('notif', 'Your password was successfully changed');
    }

    /**
     * Show delete account guide
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount(Request $request)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);
        do
        {
            $user->delete_account_token = Str::random(60);
        }
        while(User::where('delete_account_token', $user->delete_account_token)->first());
        $user->save();

        $this->sendDeleteAccountConfirmationMail($user->email, $user->name, $user->delete_account_token);

        return view('user.delete_account');
    }

    /**
     * Perform resending delete confirmation email
     *
     * @param  \Illuminate\Http\Request  $request
     * @response \Illuminate\Http\Response
     */
    public function resendDeleteAccountConfirmationMail(Request $request)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);
        $this->sendDeleteAccountConfirmationMail($user->email,
                                         $user->name,
                                         $user->delete_account_token);

        return redirect('/delete_account')->with('notif', 'New confrimation email has been sent.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Log out the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logOut(Request $request)
    {
        $request->session()->forget('_ticket');
        return redirect('/login');
    }
}
