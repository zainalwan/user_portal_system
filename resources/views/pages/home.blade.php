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
        Welcome, User. Enjoy our application.
    </p>

    <div class="button-group home">
        <span>
            <a href="/change_password">Change password</a>
        </span>
        <span>
            <a href="/delete_account">Delete account</a>
        </span>
        <span>
            <a href="/log_out">Log out</a>
        </span>
    </div>
@endsection
