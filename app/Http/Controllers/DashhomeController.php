<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ModelHelperTrait;

class DashHomeController extends Controller
{
    use ModelHelperTrait;

    public function getAllData()
    {
        $view = 'dashboard.home';
        // Define the tables you want to fetch data from
        $tables = [
            'users',
            'certifications',
            'companies',
            'degree',
            'educations',
            'experiences',
            'faculty',
            'fields',
            'graduations',
            'jobs',
            'job_applications',
            'visits',
        ];

        $data = [];

        // Loop through each table and get the corresponding model data
        foreach ($tables as $table) {
            $modelClass = $this->getModelClass($table);

            if ($modelClass) {
                $relationships = $this->getRelationships($modelClass);
                $data[$table] = $modelClass::with($relationships)->get();
            }
        }

        return view($view, compact('data'));

    }
}
