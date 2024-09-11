<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.companies.login');
    }
    
    // Admin login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the admin in
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('companies')->attempt($credentials)) {
            // Authentication passed, redirect to the correct route
            return view('companies.home');
        }
    
        // If authentication fails, check if the email exists
        $emailExists = Company::where('email', $request->email)->exists();
    
        $errors = [];
        if (!$emailExists) {
            $errors['email'] = 'البريد الإلكتروني غير صحيح';
        } else {
            $errors['password'] = 'كلمة المرور غير صحيحة';
        }
    
        return back()->withErrors($errors)->withInput($request->only('email'));
    }
}
