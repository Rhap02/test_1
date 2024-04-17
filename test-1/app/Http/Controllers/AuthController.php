<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/levels');
        }

        return redirect()->back()->withErrors([
            'phone' => 'Phone atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
