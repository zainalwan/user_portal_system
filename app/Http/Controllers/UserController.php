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

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Mail\EmailVerification;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
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
