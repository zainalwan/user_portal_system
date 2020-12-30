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
    <h3>
        Welcome, {{ $name }}. Enjoy our application.
    </h3>

    <div class="button-group home">
        <span>
            <a href="/change_password">Change password</a>
        </span>
        <span>
	    <form action="/delete_account" method="post">
		@csrf
		@method('delete')
		<ul>
		    <li><input type="submit" name="delete-account" value="Delete account"></li>
		</ul>
	    </form>
        </span>
        <span>
            <a class="button secondary" href="/log_out">Log out</a>
        </span>
    </div>
@endsection
