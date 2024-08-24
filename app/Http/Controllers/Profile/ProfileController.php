<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the authenticated user
        $admin = Admin::find(Auth::guard('admin')->user()->id);

        // Check if there is an existing image and delete it
        if ($request->hasFile('image')) {
            if ($admin->image) {
                $this->deleteImage($admin->image); // Call helper method to delete image
            }

            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();

            // Define the destination path in the public directory
            $table = 'admins'; // Replace with your actual table name or variable
            $destinationPath = public_path('images/' . $table);

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the uploaded file to the 'public/images/sections' directory with the generated filename
            $request->file('image')->move($destinationPath, $fileName);

            // Update user's image field in the database
            $admin->image = 'images/' . $table . '/' . $fileName;
        }

        // Update other profile fields
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('email');
        $admin->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // Retrieve the authenticated user
        $admin = Admin::find(Auth::guard('admin')->user()->id);

        // Check if the old password matches the current password
        if (!Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }

        // Update the user's password
        $admin->password = Hash::make($request->password);
        $admin->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    // Helper method to delete an image
    private function deleteImage($path)
    {
        if (file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
