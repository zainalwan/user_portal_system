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

    @if(session('notif'))
	<span class="notif">
            {{ session('notif') }}
	</span>
    @endif

    <form action="/warning" method="post">
        @csrf
        <ul>
            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="send-email" value="Resend recovery email">
                </span>
                <span>
                    <a class="button secondary" href="/log_out">Log out</a>
                </span>
            </li>
        </ul>
    </form>
@endsection
