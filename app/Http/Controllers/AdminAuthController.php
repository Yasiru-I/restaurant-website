<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Dena details tika hari format ekeda kiyala check kireema
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Email ekayi password ekayi match wenawada kiyala check kireema
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Login eka success nam dashboard ekata redirect wenawa
            return redirect()->intended('/admin/dashboard'); 
        }

        // 3. Details waradi nam error massage ekak ekka apahu login page ekatama yawana eka
        return back()->withErrors([
            'email' => 'Email eka hari password eka hari waradiy.',
        ])->onlyInput('email');
    }
}