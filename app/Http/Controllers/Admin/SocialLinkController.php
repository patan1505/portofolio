<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        try {
            $socialLinks = SocialLink::orderBy('urutan')->get();
            return view('admin.social-links.index', compact('socialLinks'));
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    public function create()
    {
        return view('admin.social-links.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url|max:255',
            'urutan' => 'nullable|integer',
        ]);
        
        SocialLink::create($request->all());
        
        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        return view('admin.social-links.edit', compact('socialLink'));
    }
    
    public function update(Request $request, $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url|max:255',
            'urutan' => 'nullable|integer',
        ]);
        
        $socialLink->update($request->all());
        
        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();
        
        return redirect()->route('admin.social-links.index')->with('success', 'Social link berhasil dihapus!');
    }
}