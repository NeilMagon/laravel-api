<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::with('type','technologies')->get();
        
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }

    public function show($slug){
        $project = Project::where('slug', '=', $slug)->with('type','technologies')->first();
        $apiData = [
            'success' => true,
            'results' => $project
        ];
        
        return response()->json($apiData);
    }
}
