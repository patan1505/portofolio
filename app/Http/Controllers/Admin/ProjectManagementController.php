<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectManagementController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('urutan')->get();
        return view('admin.projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('admin.projects.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'tech_stack' => 'nullable|string',
            'status' => 'nullable|string',
            'demo_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'video_link' => 'nullable|url',
            'urutan' => 'nullable|integer',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->except('screenshot');
        
        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('projects', 'public');
            $data['screenshot'] = $path;
        }
        
        Project::create($data);
        
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }
    
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'tech_stack' => 'nullable|string',
            'status' => 'nullable|string',
            'demo_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'video_link' => 'nullable|url',
            'urutan' => 'nullable|integer',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->except('screenshot');
        
        if ($request->hasFile('screenshot')) {
            if ($project->screenshot && Storage::disk('public')->exists($project->screenshot)) {
                Storage::disk('public')->delete($project->screenshot);
            }
            $path = $request->file('screenshot')->store('projects', 'public');
            $data['screenshot'] = $path;
        }
        
        $project->update($data);
        
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        if ($project->screenshot && Storage::disk('public')->exists($project->screenshot)) {
            Storage::disk('public')->delete($project->screenshot);
        }
        
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}