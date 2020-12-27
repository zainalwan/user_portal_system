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
    <span class="notif">
        The recovery email has been sent.
    </span>
    
    <form action="/forgot_password" method="post">
        @csrf
        <ul>
            <li><label for="email">Email</label></li>
            <li><input type="text" id="email" name="email" value="Enter your email..."></li>
            <li class="error">Please enter your email.</li>

            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="send" value="Send recovery email">
                </span>
                <span>
                    <a class="button secondary" href="/login">Cancel</a>
                </span>
            </li>
        </ul>
    </form>
@endsection
