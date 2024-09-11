<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;
use App\Traits\validation\JobValidationTrait;

class UpdateJob extends Controller
{
    use ModelHelperTrait, JobValidationTrait;  // Include the validation trait

    /**
     * Show the form for editing a specific job.
     */
    public function edit($id)
    {
        $fieldsModel = $this->getModelClass('fields');
        $jobsModel = $this->getModelClass('jobs');
        $fields = $fieldsModel::all(); 
        $data = $jobsModel::find($id);

        // Return the view with the job data and fields
        return view('jobs.edit', ['data' => $data, 'fields' => $fields]);
    }

    /**
     * Handle the job update process.
     */
    public function update(Request $request, $id)
    {
        // Use the JobValidationTrait for validation rules and messages
        $validator = Validator::make($request->all(), $this->jobValidationRules(), $this->jobValidationMessages());

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();  // Retain input data in case of failure
        }

        $jobModel = $this->getModelClass('jobs');

        // Retrieve the job and update its fields
        $job = $jobModel::find($id);

        if (!$job) {
            return redirect()->back()->with('error', 'لم يتم العثور على الوظيفة المطلوبة.');
        }

        // Update the job with validated data
        $job->update($request->except('_token'));  // Exclude the CSRF token

        // Redirect back with a success message
        return redirect()->back()->with('success', 'تم تعديل الوظيفة بنجاح!');
    }
}
