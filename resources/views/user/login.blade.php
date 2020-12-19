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
    <form action="/login" method="post">
        @csrf
        <ul>
            <li><label for="email">Email</label></li>
            <li><input type="text" id="email" name="email" value="Enter your email..."></li>
            <li class="error">Please enter your email.</li>

            <li><label for="password">Password</label></li>
            <li><input type="password" id="password" name="password" value="Enter your password..."></li>
            <li class="error">Please enter your password.</li>

            <li class="button-group">
                <span>
                    <input type="submit" name="login" value="Login">
                </span>
            </li>
        </ul>
    </form>

    <div class="register-direction">
        <span>Do not have an account?</span>
        <span><a href="/register">Regsiter</a> now.</span>
    </div>
@endsection
