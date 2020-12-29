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
    <form action="/reset_password/{{ $password_reset_token }}" method="post">
        @csrf
	@method('put')
        <ul>
            <li><label for="new_password">New password</label></li>
            <li><input type="password" id="new_password" name="new_password"></li>
            <li class="show-icon">
                @include('shared.eye')
            </li>
            <li class="hide-icon">
                @include('shared.eye_slash')
            </li>
	    @error('new_password')
		<li class="error">{{ $message }}</li>
	    @enderror

            <li class="button-group">
                <span>
                    <input class="button primary" type="submit" name="save" value="Save">
                </span>
            </li>
        </ul>
    </form>
@endsection
