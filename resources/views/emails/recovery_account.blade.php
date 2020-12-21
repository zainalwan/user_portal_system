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
        Welcome, User. We have catched suspicious activity to your
        account. We decide to deactivate yours temporarily. You could
        reactivate by clicking button below.
    </p>
    <p>
        Be aware of any attacks, we suggest to you to use stronger
        password.
    </p>

    <div class="button-group">
        <span>
            <a class="button primary" href="/change_password">Reset your password</a>
        </span>
    </div>
@endsection
