<?php

namespace App\Http\Controllers\Graduations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;

class ProfileGraduation extends Controller
{
    use ModelHelperTrait;

    public function info()
    {
        $id = auth('graduations')->user()->id;
        $graduationModel = $this->getModelClass('graduations');
        $facultiesModel = $this->getModelClass('faculty');
        $faculties = $facultiesModel::get();
        $degreesModel = $this->getModelClass('degree');
        $degrees = $degreesModel::get();
        $graduation = $graduationModel::with(['faculty', 'educations', 'experiences'])->find($id);

        $fieldsModel = $this->getModelClass('fields');
        $fields = $fieldsModel::get();

        // Return the view with the fields data
        return view('graduations.info', ['graduation' => $graduation , 'faculties' => $faculties , 'degrees' => $degrees , 'fields' => $fields]);
    }

    public function profile()
    {
        $id = auth('graduations')->user()->id;
        $graduationModel = $this->getModelClass('graduations');
        $facultiesModel = $this->getModelClass('faculty');
        $faculties = $facultiesModel::get();
        $degreesModel = $this->getModelClass('degree');
        $degrees = $degreesModel::get();
        $fieldsModel = $this->getModelClass('fields');
        $fields = $fieldsModel::get();
        $graduation = $graduationModel::with(['faculty', 'educations', 'experiences'])->find($id);

        // Return the view with the fields data
        return view('graduations.profile', ['graduation' => $graduation , 'faculties' => $faculties , 'degrees' => $degrees , 'fields'=>$fields]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048', // Resume: optional, max size 2MB
            'field_id' => 'required|exists:fields,id', 
            'user_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // User photo: optional, image file
            'education.*.faculty_id' => 'required|exists:faculty,id',
            'education.*.degree_id' => 'required|exists:degree,id',
            'education.*.grade' => 'required|string|max:255',
            'experience.*.company' => 'required|string|max:255',
            'experience.*.job' => 'required|string|max:255',
            'skills.*.name' => 'required|string|max:255',
            'skills.*.degree' => 'required|string|between:0,100', // Skill degree (e.g., percentage)
        ]);
    
    
        // If validation fails, return JSON response with errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation errors occurred',
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity
        }
    
        // Retrieve the Graduation model instance
        $graduationModel = $this->getModelClass('graduations');
        $graduation = $graduationModel::find($id);
        if (!$graduation) {
            return response()->json([
                'status' => 'error',
                'message' => 'Graduation entry not found'
            ], 404); // Not Found
        }
    
        // Update the contact information
        $graduation->email = $request->input('email');
        $graduation->phone = $request->input('phone');
        $graduation->address = $request->input('address');
        $graduation->field_id = $request->input('field_id');
        
        // Handle education data
        $graduation->educations()->delete(); // Delete old records to replace them
        foreach ($request->input('education', []) as $education) {
            $graduation->educations()->create($education);
        }
    
        // Handle experience data
        $graduation->experiences()->delete(); // Delete old records to replace them
        foreach ($request->input('experience', []) as $experience) {
            $graduation->experiences()->create($experience);
        }
    
        // Handle skills data
        $graduation->skills()->delete(); // Delete old records to replace them
        foreach ($request->input('skills', []) as $skill) {
            $graduation->skills()->create($skill);
        }
    
        // Handle CV file upload (Resume)
        if ($request->hasFile('resume')) {
            $resumeFile = $request->file('resume');
            $resumeFileName = time() . '.' . $resumeFile->extension(); // Generate unique file name
            $resumeFile->move(public_path('resumes'), $resumeFileName); // Move file to 'resumes' directory
            $graduation->resume = $resumeFileName;
        }
    
    
        // Save the updated graduation record
        $graduation->save();
    
        // Return a successful JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Graduation details updated successfully',
            'data' => $graduation
        ], 200); // OK
    }
    
    public function updateImage(Request $request, $id)
    {
        $graduationModel = $this->getModelClass('graduations');
        // Find the graduation record by ID
        $graduation = $graduationModel::find($id);
    
        // Check if the graduation record was found
        if (!$graduation) {
            return response()->json(['status' => 'error', 'message' => 'Graduation record not found'], 404);
        }
    
        // Check if the request has a file
        if ($request->hasFile('image')) {
            $photoFile = $request->file('image');
            $photoFileName = time() . '.' . $photoFile->extension(); // Generate unique file name
            
            // Move file to 'images/users' directory
            $photoFile->move(public_path('images/users'), $photoFileName); 
            
            // Update the image property of the graduation record
            $graduation->image = $photoFileName;
        }
    
        // Save the graduation record
        $graduation->save();
    
        // Return a success response
        return response()->json(['status' => 'success', 'message' => 'Image uploaded successfully']);
    }
    
    
}
