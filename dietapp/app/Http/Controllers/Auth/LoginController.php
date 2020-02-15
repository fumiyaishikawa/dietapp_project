<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
}
