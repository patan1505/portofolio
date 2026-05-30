<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // Cek apakah ada error
        try {
            $skills = Skill::orderBy('urutan')->get();
            return view('admin.skills.index', compact('skills'));
        } catch (\Exception $e) {
            // Jika error, tampilkan pesan
            return "Error: " . $e->getMessage();
        }
    }
    
    public function create()
    {
        return view('admin.skills.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);
        
        Skill::create($request->all());
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }
    
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);
        
        $skill->update($request->all());
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}