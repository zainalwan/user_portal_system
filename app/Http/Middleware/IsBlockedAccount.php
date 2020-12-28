<?php

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsBlockedAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = $request->session()->get('_ticket')['id'];
        $user = DB::table('users')
              ->where('id', $user_id)
              ->first();

        if($user
        && $user->active == -1)
        {
            return $next($request);
        }

        return redirect('/');
    }
}
