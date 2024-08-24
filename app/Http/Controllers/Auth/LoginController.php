<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
            // Authentication passed
            return redirect()->route('dashboard');
        }
    
        // If authentication fails, check if the email exists
        $emailExists = DB::table('users')->where('email', $request->email)->exists();
    
        $errors = [];
        if (!$emailExists) {
            $errors['email'] = 'Invalid email';
        } else {
            $errors['password'] = 'Invalid password';
        }
    
        return back()->withErrors($errors)->withInput($request->only('email'));
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('login');
    }

    // Admin login
    public function adminLogin(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to log the admin in
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed, redirect to the correct route
            return redirect()->route('dashboard');
        }
    
        // If authentication fails, check if the email exists
        $emailExists = DB::table('admins')->where('email', $request->email)->exists();
    
        $errors = [];
        if (!$emailExists) {
            $errors['email'] = 'Invalid email';
        } else {
            $errors['password'] = 'Invalid password';
        }
    
        return back()->withErrors($errors)->withInput($request->only('email'));
    }
        
    // Admin logout
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('login');
    }
}
