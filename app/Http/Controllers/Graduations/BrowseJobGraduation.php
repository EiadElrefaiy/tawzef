<?php

namespace App\Http\Controllers\Graduations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ModelHelperTrait;

class BrowseJobGraduation extends Controller
{
    use ModelHelperTrait;

    public function GetBrowseJobs(Request $request)
    {
        $fieldsModel = $this->getModelClass('fields');
        $fields = $fieldsModel::all(); 

        $jobsModel = $this->getModelClass('jobs');

        // Initialize the query
        $query = $jobsModel::query();

        // Filter by job name
        if ($request->filled('job_name')) {
            $query->where('name', 'like', '%' . $request->job_name . '%');
        }

        // Filter by state (governorate)
        if ($request->filled('state')) {
            $query->where('location', $request->state);
        }

        // Filter by field
        if ($request->filled('field_id')) {
            $query->where('field_id', $request->field_id);
        }

        // Paginate the results
        $jobs = $query->paginate(5);

        // Return the view for browsing jobs
        return view('graduations.browse-jobs', ['fields' => $fields, 'jobs' => $jobs]); // Ensure this matches the view file path
    }
}
