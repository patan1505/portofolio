<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('urutan')->get();
        
        return view('projects', compact('projects'));
    }
    
    public function show($id)
    {
        $project = Project::findOrFail($id);
        
        return view('project-detail', compact('project'));
    }
}