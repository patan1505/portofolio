<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }
    
    public function show($id)
    {
        $message = Message::findOrFail($id);
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.messages.show', compact('message'));
    }
    
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
    
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Pesan ditandai sudah dibaca!');
    }
}