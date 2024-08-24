<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Traits\ModelHelperTrait;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UpdateController extends Controller
{
    use ModelHelperTrait;

    public function edit(Request $request)
    {
        $view = $request->view;
        $table = $request->table;
        $id = $request->id;
    
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass($table);
    
        if ($modelClass) {    

            $data = $modelClass::with($this->getRelationships($modelClass))->find($id);

            // Return success response with the view and data
            return view($view, compact('data'));
        } else {
            // Handle the case where the model class is not found
            return response()->json(['error' => 'Model not found'], 404);
        }    
    }

    
    public function update(Request $request)
    {
        $table = $request->table;

        // Get Record from the database
        $data = DB::table($table)->find($request->id);

        // Initialize validation rules array
        $rules = [];

        // Store Request data in variable $requestData
        $requestData = $request->all();


        if ($request->has('name')) {
            $rules['name'] = ['required', 'string', 'max:255'];
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

        if ($requestData['table'] == 'users') {
            if ($request->has('password')) {
                if($request->password != ''){
                    $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
                    $rules['password_confirmation'] = ['required', 'string', 'min:8'];    
                }
            }    
        if ($request->has('email')) {
            $rules['email'] = [
                'required',
                'string',
                'min:11',
                Rule::unique($table)->ignore($data->id)
            ];
        }
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

        if ($requestData['table'] == 'users') {
            if ($request->has('password')) {
              if($request->password != ''){
            $requestData['password'] = Hash::make($requestData['password']);
            }else{
                unset($requestData['password']);
            }
          }
        }

        // Check if the request contains a file named 'image'
        if ($request->hasFile('image')) {
            // Check if there is an existing image and delete it
            if ($data && $data->image) {
                $existingImagePath = public_path($data->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

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
            $requestData = array_merge($request->all(), ['image' => 'images/' . $table . '/' . $fileName]);
        }

            // Format created_at and updated_at fields
            $created_at = $request->has('created_at') ? Carbon::createFromFormat('m/d/Y', $request->input('created_at'))->format('Y-m-d H:i:s') : now();
            $updated_at = now();

            $requestData['created_at'] = $created_at;
            $requestData['updated_at'] = $updated_at;

            
            unset($requestData['table']);
            unset($requestData['_token']);
            unset($requestData['password_confirmation']);


            if ($data) {
                DB::table($table)->where('id', $request->id)->update($requestData);
            } else {
                return response()->json(['message' => 'not found'], 404);
            }
        
            return response()->json(['status' => true, "message" => "Data Updated Successfully"], 201);
    }
}