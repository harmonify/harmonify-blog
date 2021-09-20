<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->get('remember_me') === 'on';
        
        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return redirect('/login')
            ->with('alert', [
                'type' => 'danger',
                'message' => 'Login failed!',
            ])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // request()->session()->invalidate();
        $request->session()->invalidate();

        // request()->session()->regenerateToken();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
