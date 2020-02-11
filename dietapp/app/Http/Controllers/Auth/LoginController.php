<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Login用 Illuminate\Foundation\Auth\AuthenticatesUsersのauthenticatedメソッドを上書きしてリダイレクトを止める
    protected function authenticated(Request $request, $user)
    {
        return $user;
    }

    //Logout用 AuthenticatesUsersトレイトのlogoutメソッドを上上書きしてリダイレクトを止める
    protected function loggedOut(Request $request) {
        //セッションを再生成する
        $request->session()->regenerate();

        return response()->json();
    }

    // Google認証用
    public function redirectToGoogle()
    {
        // Googleへのリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Google認証後の処理
        $gUser = Socailite::driver('google')->stateless()->user();
        // emailが合致するユーザーを取得
        $user = User::where('email', $gUser->email)->first();
        // 見つからなければ新しくユーザーを作成
        if ($user == null) {
            $user = $this->createUserByGoogle($gUser);
        }
        // ログイン処理
        Auth::login($user, true);
        return redirect('/user');
    }

    public function createUserByGoogle($gUser)
    {
        $user = User::create([
            'name' => $gUser->name,
            'email' => $gUser->email,
            'password' => Hash::make(uniqid()), //ランダムな値を生成してハッシュ化する
        ]);

        return $user;
    }
}
