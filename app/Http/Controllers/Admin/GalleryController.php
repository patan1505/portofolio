<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        try {
            $galleries = Gallery::orderBy('urutan')->get();
            return view('admin.galleries.index', compact('galleries'));
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    public function create()
    {
        return view('admin.galleries.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'urutan' => 'nullable|integer',
        ]);
        
        $path = $request->file('foto')->store('galleries', 'public');
        
        Gallery::create([
            'judul' => $request->judul,
            'foto' => $path,
            'urutan' => $request->urutan ?? 0,
        ]);
        
        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
    }
    
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $request->validate([
            'judul' => 'required|string|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'urutan' => 'nullable|integer',
        ]);
        
        $data = ['judul' => $request->judul, 'urutan' => $request->urutan ?? 0];
        
        if ($request->hasFile('foto')) {
            if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
                Storage::disk('public')->delete($gallery->foto);
            }
            $path = $request->file('foto')->store('galleries', 'public');
            $data['foto'] = $path;
        }
        
        $gallery->update($data);
        
        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
            Storage::disk('public')->delete($gallery->foto);
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil dihapus!');
    }
}