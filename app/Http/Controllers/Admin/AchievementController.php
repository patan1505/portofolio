<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        try {
            $achievements = Achievement::orderBy('tahun', 'desc')->get();
            return view('admin.achievements.index', compact('achievements'));
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    public function create()
    {
        return view('admin.achievements.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:200',
            'tahun' => 'required|string|max:10',
            'deskripsi' => 'nullable|string',
            'sertifikat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->except('sertifikat');
        
        if ($request->hasFile('sertifikat')) {
            $path = $request->file('sertifikat')->store('sertifikat', 'public');
            $data['sertifikat'] = $path;
        }
        
        Achievement::create($data);
        
        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('admin.achievements.edit', compact('achievement'));
    }
    
    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        
        $request->validate([
            'nama_prestasi' => 'required|string|max:200',
            'tahun' => 'required|string|max:10',
            'deskripsi' => 'nullable|string',
            'sertifikat' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->except('sertifikat');
        
        if ($request->hasFile('sertifikat')) {
            if ($achievement->sertifikat && Storage::disk('public')->exists($achievement->sertifikat)) {
                Storage::disk('public')->delete($achievement->sertifikat);
            }
            $path = $request->file('sertifikat')->store('sertifikat', 'public');
            $data['sertifikat'] = $path;
        }
        
        $achievement->update($data);
        
        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        
        if ($achievement->sertifikat && Storage::disk('public')->exists($achievement->sertifikat)) {
            Storage::disk('public')->delete($achievement->sertifikat);
        }
        
        $achievement->delete();
        
        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}