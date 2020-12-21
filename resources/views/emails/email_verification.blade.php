@php
/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/
@endphp

@extends('layout.email')

@section('content')
    <p>
        Welcome, User. We should know that email you use is
        valid. Your email is used to security purpose of your
        account.
    </p>
    <p>
        By clicking verify button below, you could activate
        your account and start enjoy our application.
    </p>

    <div class="button-group">
        <span>
            <a class="button primary" href="/change_password">Verify your email.</a>
        </span>
    </div>
@endsection
