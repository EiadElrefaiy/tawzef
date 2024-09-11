<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;

class ProfileCompany extends Controller
{
    use ModelHelperTrait;

    public function profile()
    {
        $id = auth('companies')->user()->id;
        $companyModel = $this->getModelClass('companies');
        $company = $companyModel::with('jobs')->find($id);

        // Return the view with the fields data
        return view('companies.profile', ['company' => $company]);
    }
}
