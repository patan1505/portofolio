<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }
    
    public function update(Request $request)
    {
        $profile = Profile::first();
        
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'teks_kiri_1' => 'nullable|string|max:100',
            'teks_kiri_2' => 'nullable|string|max:100',
            'teks_kiri_3' => 'nullable|string|max:100',
            'teks_kanan_1' => 'nullable|string|max:100',
            'teks_kanan_2' => 'nullable|string|max:100',
            'teks_kanan_3' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:200',
            'cerita_perjalanan' => 'nullable|string',
            'edukasi_sekolah' => 'nullable|string|max:100',
            'edukasi_jurusan' => 'nullable|string|max:100',
            'hobi_1' => 'nullable|string|max:100',
            'hobi_2' => 'nullable|string|max:100',
            'motto' => 'nullable|string|max:200',
            'email_aktif' => 'required|email',
            'lokasi' => 'nullable|string|max:100',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if ($request->hasFile('foto_profil')) {
            if ($profile->foto_profil && Storage::disk('public')->exists($profile->foto_profil)) {
                Storage::disk('public')->delete($profile->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $validated['foto_profil'] = $path;
        }
        
        $profile->update($validated);
        
        return redirect()->route('admin.profile.edit')->with('success', 'Profile berhasil diupdate!');
    }
}