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
	Your password successfully changed.
    </span>

    <form action="/register" method="post">
        @csrf
        <ul>
            <li><label for="current_password">Current password</label></li>
            <li><input type="password" id="current_password" name="current_password" value="Enter your password..."></li>
            <li class="error">Please enter your current password.</li>

            <li><label for="new_password">New password</label></li>
            <li><input type="password" id="new_password" name="new_password" value="Enter your new password..."></li>
            <li class="show-icon">
                @include('shared.eye')
            </li>
            <li class="hide-icon">
                @include('shared.eye_slash')
            </li>
            <li class="error">Please enter new current password.</li>

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
