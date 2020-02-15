<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * JSのAjax通信を利用して違うドメインのサイトの情報を取得する(今回はGoogle認証)->不正を防ぐために禁止
         * Access-Control-Allow-Originで許可を与える必要がある
         */
        return $next($request)
            // サーバー(API)へのアクセスを許可するオリジンを指定
            ->header("Access-Control-Allow-Origin: *")
            // 許可するHTTPリクエストのメソッドを指定
            ->header("Access-Control-Allow-Methods: *")
            // 許可するHTTPヘッダーを指定
            ->header("Access-Control-Allow-Headers: *");
    }
}
