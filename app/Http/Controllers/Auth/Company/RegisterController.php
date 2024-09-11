<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
public function showRegistrationForm()
    {
        return view('auth.companies.register');
    }

    /**
     * Handle the company registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:companies,email',
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'commercial_index' => 'required|string|max:255',
            'tax_card' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle the image upload if provided
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/companies', $imageName);
        }

        // Create a new company
        Company::create([
            'email' => $request->email,
            'name' => $request->name,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'commercial_index' => $request->commercial_index,
            'tax_card' => $request->tax_card,
            'password' => Hash::make($request->password),
            'image' => $imageName,
        ]);

        // Redirect to a desired route with success message
        return redirect()->route('index');
    }
}