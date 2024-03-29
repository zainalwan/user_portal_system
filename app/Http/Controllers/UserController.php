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
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\CreateNewPasswordRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Mail\EmailVerification;
use App\Mail\PasswordReset;
use App\Mail\DeleteAccountConfirmation;
use App\Mail\AccountRecovery;

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
     * Send password reset mail
     *
     * @return void
     */
    private function sendPasswordResetMail($email, $name, $password_reset_token)
    {
        Mail::to($email)
            ->send(new PasswordReset($name, $password_reset_token));
    }

    /**
     * Send account recovery mail
     *
     * @return void
     */
    private function sendAccountRecoveryMail($email, $name, $password_reset_token)
    {
        Mail::to($email)
            ->send(new AccountRecovery($name, $password_reset_token));
    }

    /**
     * Showing registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('user.register', ['title' => 'REGISTER']);
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
        return view('user.login', ['title' => 'LOGIN']);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);

        return view('user.verify_email', [
            'title' => 'VERIFY YOUR EMAIL',
            'name' => $user->name
        ]);
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
     * Show warning caution
     *
     * @return \Illuminate\Http\Response
     */
    public function warning()
    {
        return view('user.warning', ['title' => 'WARNING']);
    }

    /**
     * Reseend account recovery mail
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resendAccountRecoveryMail(Request $request)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = User::find($user_id);
        $this->sendAccountRecoveryMail($user->email, $user->name, $user->password_reset_token);

        return redirect('/warning')->with('notif', 'The new recovery mail has been sent.');
    }

    /**
     * Show forgot password form
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $request->session()->forget('login_email');
        return view('user.forgot_password', ['title' => 'FORGOT PASSWORD']);
    }

    /**
     * Send password reset mail
     *
     * @param  \App\Http\Requests\PasswordResetRequest  $request
     * @return void
     */
    public function setPasswordResetToken(ForgotPasswordRequest $request)
    {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();
        do
        {
            $user->password_reset_token = Str::random(60);
        }
        while(User::where('password_reset_token', $user->password_reset_token)->first());
        $user->save();

        $this->sendPasswordResetMail($user->email, $user->name, $user->password_reset_token);

        return redirect('forgot_password')->with('notif', 'The recovery email has been sent');
    }

    /**
     * Show reset password form
     *
     * @param  $password_reset_token
     * @return \Illuminate\Http\Response
     */
    public function resetPassword($password_reset_token)
    {
        $user = User::where('password_reset_token', $password_reset_token)->first();
        if(!$user)
        {
            abort(404);
        }
        return view('user.reset_password', [
            'title' => 'RESET PASSWORD',
            'password_reset_token' => $password_reset_token
        ]);
    }

    /**
     * Reset password to a new password
     *
     * @param  \App\Http\Request\CreateNewPasswordRequest  $request
     * @param  $password_reset_token
     * @return \Illuminate\Http\Response
     */
    public function createNewPassword(CreateNewPasswordRequest $request, $password_reset_token)
    {
        $validated = $request->validated();

        $user = User::where('password_reset_token', $password_reset_token)->first();

        if(!$user)
        {
            abort(404);
        }

        $user->password_reset_token = null;
        $user->password = Hash::make($validated['new_password']);
        if($user->active == -1)
        {
            $user->active = 1;
        }
        $user->save();

        $ticket = [
            'id' => $user->id,
            'name' => $user->name,
            'user_name' => $user->user_name,
            'email' => $user->email,
        ];
        $request->session()->put('_ticket', $ticket);
        return redirect('/');
    }

    /**
     * Show change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('user.change_password', ['title' => 'CHANGE PASSWORD']);
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
     * Perform setting the delete account token and send its email confirmation
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setDeleteAccountToken(Request $request)
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

        return redirect('/delete_account');
    }

    /**
     * Show delete account guide
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount()
    {
        return view('user.delete_account', ['title' => 'DELETE ACCOUNT']);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  $delete_account_token
     * @return \Illuminate\Http\Response
     */
    public function destroyAccount(Request $request, $delete_account_token)
    {
        $user = User::where('delete_account_token', $delete_account_token)->first();
        if(!$user)
        {
            abort(404);
        }

        $name = $user->name;
        $user->delete();
        $request->session()->forget('_ticket');

        $request->session()->put('just_deleted', true);
        $request->session()->put('name', $name);
        return redirect('byebye');
    }

    /**
     * Perform canceling account deletion
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $delete_account_token
     * @return \Illuminate\Http\Response
     */
    public function cancelDeleteAccount(Request $request, $delete_account_token)
    {
        $user = User::where('delete_account_token', $delete_account_token)->first();

        if(!$user)
        {
            abort(404);
        }

        $user->delete_account_token = null;
        $user->save();

        $ticket = [
            'id' => $user->id,
            'name' => $user->name,
            'user_name' => $user->user_name,
            'email' => $user->email,
        ];
        $request->session()->put('_ticket', $ticket);
        return redirect('/');
    }

    /**
     * Show byebye view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function byebye(Request $request)
    {
        $name = $request->session()->get('name');

        $request->session()->forget(['name', 'just_deleted']);

        return view('user.byebye', [
            'title' => 'THANK YOU',
            'name' => $name
        ]);
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
