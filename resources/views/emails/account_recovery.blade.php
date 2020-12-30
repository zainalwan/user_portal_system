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
        Welcome, {{ $name }}. We have catched suspicious activity to your
        account. We decide to deactivate yours temporarily. You could
        reactivate by clicking button below.
    </p>
    <p>
        Be aware of any attacks, we suggest to you to use stronger
        password.
    </p>

    <div class="button-group">
        <span>
            <a class="button primary" href="{{ url('/reset_password/{$password_reset_token}') }}">Get your account back</a>
        </span>
    </div>
@endsection
