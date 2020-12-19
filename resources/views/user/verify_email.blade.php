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

    <span class="notif">
        The verification email has been sent.
    </span>

    <form action="/verify_email" method="post">
        @csrf
        <ul>
            <li class="button-group">
                <span>
                    <input type="submit" name="send-email" value="Send verification email">
                </span>
            </li>
        </ul>
    </form>
@endsection
