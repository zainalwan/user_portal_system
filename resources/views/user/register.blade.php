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
            <li><input type="text" id="name" name="name" value="{{ old('name') }}"></li>
	    @error('name')
                <li class="error">{{ $message }}</li>
	    @enderror

            <li><label for="user_name">User name</label></li>
            <li><input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}"></li>
	    @error('user_name')
                <li class="error">{{ $message }}</li>
	    @enderror
            
            <li><label for="email">Email</label></li>
            <li><input type="text" id="email" name="email" value="{{ old('email') }}"></li>
	    @error('email')
                <li class="error">{{ $message }}</li>
	    @enderror

            <li><label for="password">Password</label></li>
            <li><input type="password" id="password" name="password"></li>
            <li class="show-icon">
                @include('shared.eye')
            </li>
            <li class="hide-icon">
                @include('shared.eye_slash')
            </li>
	    @error('password')
                <li class="error">{{ $message }}</li>
	    @enderror

            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="register" value="Register">
                </span>
            </li>
        </ul>
    </form>

    <div class="login-direction">
        <span>Already have an account?</span>
        <span><a href="/login">Login</a> now.</span>
    </div>
@endsection
