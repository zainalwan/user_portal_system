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
                    <input class="button primary" type="submit" name="login" value="Login">
                </span>
            </li>
        </ul>
    </form>

    <div class="register-direction">
        <span>Do not have an account?</span>
        <span><a href="/register">Regsiter</a> now.</span>
    </div>
@endsection
