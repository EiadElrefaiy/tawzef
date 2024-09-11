<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ModelHelperTrait;

class DeleteJob extends Controller
{
    use ModelHelperTrait;

    public function delete(Request $request)
    {
        $jobModel = $this->getModelClass('jobs');
        $job = $jobModel::find($request->id);
    
        if ($job) {
            $job->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'الوظيفة غير موجودة']);
        }
    }
}
