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
    <form action="/register" method="post">
        @csrf
        <ul>
            <li><label for="name">Name</label></li>
            <li><input type="text" id="name" name="name" value="Enter your name..."></li>
            <li class="error">Please enter your name.</li>

            <li><label for="user_name">User name</label></li>
            <li><input type="text" id="user_name" name="user_name" value="Enter your user name..."></li>
            <li class="error">Please enter your user_name.</li>
            
            <li><label for="email">Email</label></li>
            <li><input type="text" id="email" name="email" value="Enter your email..."></li>
            <li class="error">Please enter your email.</li>

            <li><label for="password">Password</label></li>
            <li><input type="password" id="password" name="password" value="Enter your password..."></li>
            <li class="show-icon">
                @include('shared.eye')
            </li>
            <li class="hide-icon">
                @include('shared.eye_slash')
            </li>
            <li class="error">Please enter your password.</li>

            <li class="button-group">
                <span>
                    <input type="submit" name="register" value="Register">
                </span>
            </li>
        </ul>
    </form>

    <div class="login-direction">
        <span>Already have an account?</span>
        <span><a href="/login">Login</a> now.</span>
    </div>
@endsection
