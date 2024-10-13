<?php

namespace App\Http\Controllers\Graduations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;

class HomeController extends Controller
{
    use ModelHelperTrait;

    public function home()
    {
        $authentecatedGraduation = auth('graduations')->user();

        $jobsModel = $this->getModelClass('jobs');

        $relatedJobs = $jobsModel::where("field_id", $authentecatedGraduation->field_id)->get();

        // Return the view with the fields data
        return view('graduations.home', ['relatedJobs' => $relatedJobs]);
    }    
}
