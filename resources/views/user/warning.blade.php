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

@extends('layout.app')

@section('content')
    <p>
        We decide to deactivate your account, since there was
        sispicious activity at yours. Please check your email to
        activate and reset your password.
    </p>
    <p>Click button below to resend recovery email.</p>

    <span class="notif">
        The recovery email has been sent.
    </span>

    <form action="/warning" method="post">
        @csrf
        <ul>
            <li class="button-group">
                <span>
                    <input type="submit" name="send-email" value="Send recovery email">
                </span>
                <span>
                    <a href="/log_out">Log out</a>
                </span>
            </li>
        </ul>
    </form>
@endsection
