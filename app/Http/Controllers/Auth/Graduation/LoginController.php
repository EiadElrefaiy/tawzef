<?php

namespace App\Http\Controllers\Auth\Graduation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\Graduation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.graduations.login');
    }
    
    // Graduation login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the admin in
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('graduations')->attempt($credentials)) {
            // Authentication passed, redirect to the correct route
            return view('graduations.home');
        }
    
        // If authentication fails, check if the email exists
        $emailExists = Graduation::where('email', $request->email)->exists();
    
        $errors = [];
        if (!$emailExists) {
            $errors['email'] = 'البريد الإلكتروني غير صحيح';
        } else {
            $errors['password'] = 'كلمة المرور غير صحيحة';
        }
    
        return back()->withErrors($errors)->withInput($request->only('email'));
    }
}
