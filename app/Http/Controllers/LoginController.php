<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended()->with('login_success','ログインしました');
        }
        else{
            return back()->withErrors(['login_error' => 'メールアドレスまたはパスワードが間違っています']);
        }
    }

    public function logout(Request $request){
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
