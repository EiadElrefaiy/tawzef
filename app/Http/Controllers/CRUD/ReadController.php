<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ModelHelperTrait;
use Illuminate\Support\Facades\Schema;

class ReadController extends Controller
{
    use ModelHelperTrait;
    
    public function index(Request $request)
    {
        $table = $request->table;
        $view = $request->view;
    
        // Determine the model class based on the table name
        $modelClass = $this->getModelClass($table);
    
        if ($modelClass) {
            // Check if the table has the 'arrangement' column
            $hasArrangementColumn = Schema::hasColumn($table, 'arrangement');
    
            // Initialize the query builder
            $query = $modelClass::with($this->getRelationships($modelClass));
    
            // Apply sorting by 'arrangement' if the column exists
            if ($hasArrangementColumn) {
                $query->orderBy('arrangement', 'asc');
            }
    
            // Get the data from the query
            $data = $query->get();
    
            // Return success response with the view and data
            return view($view, compact('data'));
        } else {
            // Handle the case where the model class is not found
            return response()->json(['error' => 'Model not found'], 404);
        }
    }
            
    public function read(Request $request)
    {
        $table = $request->table;
        $view = $request->view;

        // Check if the table has the 'arrangement' column
        $hasArrangementColumn = Schema::hasColumn($table, 'arrangement');

        // Get Record from the database, sorted by 'arrangement' if it exists
        if ($hasArrangementColumn) {
            $data = DB::table($table)
                ->orderBy('arrangement', 'asc')
                ->find($request->id);
        } else {
            $data = DB::table($table)->find($request->id);
        }

        // Return success response
        return view($view, compact('data'));
    }
}