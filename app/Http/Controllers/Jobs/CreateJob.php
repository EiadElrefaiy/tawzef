<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;
use App\Traits\validation\JobValidationTrait;

class CreateJob extends Controller
{
    use ModelHelperTrait, JobValidationTrait;

    /**
     * Display the form to add a new job.
     */
    public function add()
    {
        $fieldsModel = $this->getModelClass('fields');
        $fields = $fieldsModel::all(); 

        // Return the view with the fields data
        return view('jobs.add', ['fields' => $fields]);
    }

    /**
     * Handle job creation and validation.
     */
    public function create(Request $request)
    {
        // Use the JobValidationTrait for validation rules and messages
        $validator = Validator::make($request->all(), $this->jobValidationRules(), $this->jobValidationMessages());

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Retain input data
        }

        // Get the job model
        $jobModel = $this->getModelClass('jobs');

        // If validation passes, save the job to the database
        $job = $jobModel::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'number' => $request->input('number'),
            'announcement_date' => $request->input('announcement_date'),
            'salary' => $request->input('salary'),
            'company_id' => auth('companies')->user()->id,
            'field_id' => $request->input('field_id'),
            'type' => $request->input('type'),
            'years_of_experience' => $request->input('years_of_experience'),
            'required_gender' => $request->input('required_gender'),
            'required_qualification' => $request->input('required_qualification'),
            'computer_type' => $request->input('computer_type'),
            'description' => $request->input('description'),
        ]);

        // Redirect to the form with a success message
        return redirect()->route('jobs.add')->with('success', 'تمت إضافة الوظيفة بنجاح!');
    }
}
