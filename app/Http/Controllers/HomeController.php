<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first() ?? new Profile();
        $latestProjects = Project::orderBy('urutan')->take(3)->get();
        
        return view('home', compact('profile', 'latestProjects'));
    }
}