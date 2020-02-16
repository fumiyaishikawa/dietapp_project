<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // RedirectIfAuthenticatedミドルウェアはログイン状態によりアクセス権限を設定できる
        // アクセス権限がない場合はuserAPIを読み込んでリダイレクトさせる
        if (Auth::guard($guard)->check()) {
            return redirect()->route('user');
        }

        return $next($request);
    }
}
