<?php

namespace App\Http\Controllers\Auth\Graduation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogoutController extends Controller
{    
    public function logout()
    {
        Auth::guard('graduations')->logout();
        return redirect()->route('get-graduation.login');
    }
}
