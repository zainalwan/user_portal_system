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
        Welcome, User. We are so sorry to hear your decision. We hope
        you have enjoy our application well.
    </p>
    <p>
        You could delete your account or cancel it by clicking a
        button below.
    </p>

    <div class="button-group">
        <span>
            <a class="button secondary" href="/change_password">Delete account</a>
        </span>
        <span>
            <a class="button primary" href="/change_password">Cancel</a>
        </span>
    </div>
@endsection
