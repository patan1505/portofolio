<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SocialLink;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $socialLinks = SocialLink::orderBy('urutan')->get();
        
        return view('contact', compact('profile', 'socialLinks'));
    }
    
    public function sendMessage(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'pesan' => 'required|string',
        ]);
        
        Message::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'is_read' => false,
        ]);
        
        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}