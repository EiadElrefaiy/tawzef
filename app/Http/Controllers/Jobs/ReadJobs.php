<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;

class ReadJobs extends Controller
{
    use ModelHelperTrait;

    public function index()
    {
        $id = auth('companies')->user()->id;
        $JobsModel = $this->getModelClass('jobs');
        $jobs = $JobsModel::with('company')->where("company_id" , $id)->get(); 

        // Return the view with the fields data
        return view('jobs.company_jobs', ['jobs' => $jobs]);
    }
}
