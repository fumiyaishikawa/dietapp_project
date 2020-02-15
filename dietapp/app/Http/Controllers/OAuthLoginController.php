<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;

class OAuthLoginController extends Controller
{
    // Googleへのリダイレクト
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Googleの認証情報からユーザー情報の取得
    public function handleGoogleCallback()
    {
        $gUser = Socailite::driver('google')->user();
        // emailが合致するユーザーを取得
        $user = User::firstOrNew(['email' => $gUser->email]);

        // 見つからなければ新しくユーザーを作成
        if (!$user->exists) {
            $user['name'] = $gUser->getNickName() ?? $gUser->getName() ?? $gUser->getNick();
            $user['email'] = $gUser->email; // Gmailアドレス
            $user['password'] = str_random(); // 適当に生成

            $user->save();
        }

        // ログイン処理
        Auth::login($user);
        // return redirect('/user');
    }
}
