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
    <p>Welcome, User. Please verify your email by clicking the link we have sent.</p>
    <p>Click button below to resend verification email.</p>

    @if(session('notif'))
	<span class="notif">
            The verification email has been sent.
	</span>
    @endif

    <form action="/verify" method="post">
        @csrf
        <ul>
            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="send-email" value="Resend verification email">
                </span>
            </li>
        </ul>
    </form>
@endsection
