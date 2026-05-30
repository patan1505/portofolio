<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Message;
use App\Models\Achievement;

class AdminController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalMessages = Message::count();
        $unreadMessages = Message::where('is_read', false)->count();
        $totalAchievements = Achievement::count();
        
        $latestMessages = Message::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalProjects', 'totalMessages', 'unreadMessages', 
            'totalAchievements', 'latestMessages'
        ));
    }
}