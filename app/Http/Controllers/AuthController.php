<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $auth = Auth::attempt([
            'username' => $username,
            'password' => $password,
        ]);

        if ($auth){
            return redirect(route('dashboard::dashboard'));
        }else{
            return redirect()->route('login-page')->with('danger','Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login-page'))->with('success','Logout Sukses !');
    }
}
