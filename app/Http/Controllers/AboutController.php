<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Gallery;

class AboutController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('urutan')->get();
        $achievements = Achievement::orderBy('tahun', 'desc')->get();
        $galleries = Gallery::orderBy('urutan')->get();
        
        return view('about', compact('profile', 'skills', 'achievements', 'galleries'));
    }
}