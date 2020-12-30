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
        Welcome, {{ $name }}. We are so sorry to hear your decision. We hope
        you have enjoy our application well.
    </p>
    <p>
        You could delete your account or cancel it by clicking a
        button below.
    </p>

    <div class="button-group">
        <span>
            <a class="button secondary" href="{{ url("/delete_account/{$delete_account_token}") }}">Delete account</a>
        </span>
        <span>
            <a class="button primary" href="{{ url("/delete_account/{$delete_account_token}/cancel") }}">Cancel</a>
        </span>
    </div>
@endsection
