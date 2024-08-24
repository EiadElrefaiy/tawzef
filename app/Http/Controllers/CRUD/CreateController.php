<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Traits\ModelHelperTrait;
use Carbon\Carbon;

class CreateController extends Controller
{
    use ModelHelperTrait;
public function create(Request $request)
{
    $table = $request->table;
    
    // Initialize validation rules array
    $rules = [];
    
    // Add rules conditionally based on the existence of the fields in the request
    if ($request->has('name')) {
        $rules['name'] = ['required', 'string', 'max:255'];
    }
    if ($request->has('email')) {
        $rules['email'] = ['required', 'string', 'email', 'min:11', 'unique:' . $table];
    }
    if ($request->has('password')) {
        $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        $rules['password_confirmation'] = ['required', 'string', 'min:8'];
    }
    if ($request->hasFile('image')) {
        $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
    }
    if ($request->has('step_id')) {
        $rules['step_id'] = ['required'];
    }
    if ($request->has('description')) {
        $rules['description'] = ['required'];
    }
    // Create a validator instance and validate the request
    $validator = Validator::make($request->all(), $rules);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422); // Unprocessable Entity status code
    }

    // Initialize $fileName variable
    $fileName = null;

    // Merge the filename with request data
    $requestData = $request->all();

    if (isset($requestData['password'])) {
        $requestData['password'] = Hash::make($requestData['password']);
    }

        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('image')->extension();

            // Define the destination path in the public directory
            $destinationPath = 'images/' . $table;

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the uploaded file to the 'public/images/sections' directory with the generated filename
            $request->file('image')->move($destinationPath, $fileName);

            // Merge the filename with request data
            $requestData['image'] = 'images/' . $table . '/' . $fileName;
        }

        // Format created_at and updated_at fields
        $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
        $updated_at = now();

        $requestData['created_at'] = $created_at;
        $requestData['updated_at'] = $updated_at;

        unset($requestData['table']);
        unset($requestData['password_confirmation']);
        unset($requestData['_token']);
        unset($requestData['id']);


        // Insert data into database using DB facade
        $record = DB::table($table)->insert($requestData);

        // Get the ID of the last inserted record
        $lastInsertedId = DB::getPdo()->lastInsertId();

        // Fetch the inserted record from the database
        $data = DB::table($table)->find($lastInsertedId);

        // Return success response
        return response()->json(['status' => true, 'data' => $data], 201);
   }



   public function createNewsLetter(Request $request)
   {

        $table = $request->table;
        
        // Initialize validation rules array
        $rules = [];

        $requestData = $request->all();

        if ($request->has('email')) {
            $rules['email'] = ['required', 'string', 'email', 'min:11'];
        }

        // Create a validator instance and validate the request
        $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()], 422);
       }

        // Format created_at and updated_at fields
        $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
        $updated_at = now();

        $requestData['created_at'] = $created_at;
        $requestData['updated_at'] = $updated_at;

        unset($requestData['table']);
        unset($requestData['_token']);

        // Insert data into database using DB facade
        $record = DB::table($table)->insert($requestData);


       $successMessage = app()->isLocale('ar') ? 'تم إرسال بريدك الإلكتروني بنجاح!' : 'Your email has been successfully submitted!';

       return response()->json(['success' => $successMessage], 200);
   }
  


    public function createBooking(Request $request)
    {
        $table = $request->table;
            
        // Initialize validation rules array
        $rules = [];

        $requestData = $request->all();

        if ($request->has('name')) {
            $rules['name'] = ['required', 'string'];
        }
        if ($request->has('phone')) {
            $rules['phone'] = ['required', 'string'];
        }
        if ($request->has('location')) {
            $rules['location'] = ['required', 'string'];
        }
        if ($request->has('service')) {
            $rules['service'] = ['required', 'string'];
        }

        // Create a validator instance and validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Format created_at and updated_at fields
        $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
        $updated_at = now();

        $requestData['created_at'] = $created_at;
        $requestData['updated_at'] = $updated_at;

        unset($requestData['table']);
        unset($requestData['_token']);

        // Insert data into database using DB facade
        $record = DB::table($table)->insert($requestData);

        // Prepare the success message based on the locale
        $successMessage = app()->isLocale('ar') ? 'تم إرسال طلبك بنجاح!' : 'Your order has been successfully sent!';

        // Return the success response
        return response()->json(['success' => $successMessage], 200);
    }

}
