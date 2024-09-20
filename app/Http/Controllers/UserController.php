<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('pages.login.index');
    }
    public function actionLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Login Sukses');
            return redirect()->route('dashboard');
        } else {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error('Login gagal');
            return redirect()->route('login');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Logout Sukses');
        return redirect()->route('dashboard');
    }
}
