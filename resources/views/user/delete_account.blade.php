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
    <p>Please check your email to decide wether you surely want to delete this account or not.</p>
    <p>Click button below to resend deletion confirmation email.</p>

    @if(session('notif'))
	<span class="notif">
	    {{ session('notif') }}
	</span>
    @endif

    <form action="/delete_account" method="post">
        @csrf
        <ul>
            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="send-email" value="Resend confirmation email">
                </span>
            </li>
        </ul>
    </form>
@endsection
