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

        // Return the view with the fields data
        return view('graduations.info', ['graduation' => $graduation , 'faculties' => $faculties , 'degrees' => $degrees]);
    }

    public function profile()
    {
        $id = auth('graduations')->user()->id;
        $graduationModel = $this->getModelClass('graduations');
        $facultiesModel = $this->getModelClass('faculty');
        $faculties = $facultiesModel::get();
        $degreesModel = $this->getModelClass('degree');
        $degrees = $degreesModel::get();
        $graduation = $graduationModel::with(['faculty', 'educations', 'experiences'])->find($id);

        // Return the view with the fields data
        return view('graduations.profile', ['graduation' => $graduation , 'faculties' => $faculties , 'degrees' => $degrees]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048', // Max size 2MB for CV upload
            'education.*.faculty_id' => 'required|exists:faculty,id',
            'education.*.degree_id' => 'required|exists:degree,id',
            'education.*.grade' => 'required|string|max:255',
            'experience.*.company' => 'required|string|max:255',
            'experience.*.job' => 'required|string|max:255',
            'skills.*.name' => 'required|string|max:255',
            'skills.*.degree' => 'required|string|between:0,100', // Assuming skill level is percentage
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
        
        // Handle education data
        $graduation->educations()->delete(); // Optional: delete old records if you want to replace them
        foreach ($request->input('education', []) as $education) {
            $graduation->educations()->create($education);
        }

        // Handle experience data
        $graduation->experiences()->delete(); // Optional: delete old records if you want to replace them
        foreach ($request->input('experience', []) as $experience) {
            $graduation->experiences()->create($experience);
        }

        // Handle skills data
        $graduation->skills()->delete(); // Optional: delete old records if you want to replace them
        foreach ($request->input('skills', []) as $skill) {
            $graduation->skills()->create($skill);
        }

        // Handle CV file upload
        if ($request->hasFile('resume')) {
            // Generate a unique filename based on current time and file extension
            $fileName = time() . '.' . $request->file('resume')->extension();

            // Define the destination path in the public directory
            $destinationPath = public_path('resumes');

            // Move the uploaded file to the 'public/images/sections' directory with the generated filename
            $request->file('resume')->move($destinationPath, $fileName);

            $graduation->resume = $fileName;
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

}
