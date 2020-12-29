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
    @if(session('notif'))
	<span class="notif">
	    {{ session('notif') }}
	</span>
    @endif

    <form action="/change_password" method="post">
        @csrf
	@method('put')
        <ul>
            <li><label for="current_password">Current password</label></li>
            <li><input type="password" id="current_password" name="current_password"></li>
	    @error('current_password')
                <li class="error">{{ $message }}</li>
	    @enderror

            <li><label for="new_password">New password</label></li>
            <li><input type="password" id="new_password" name="new_password" value="Enter your new password..."></li>
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
                <span>
                    <a class="button secondary" href="/">Cancel</a>
                </span>
            </li>
        </ul>
    </form>
@endsection
