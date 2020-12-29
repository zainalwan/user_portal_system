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
        Welcome, {{ $name }}. You could reset your password by clicking the button below.
    </p>

    <div class="button-group">
        <span>
            <a class="button primary" href="{{ url("/password_reset/{$password_reset_token}") }}">Reset your password</a>
        </span>
    </div>
@endsection
