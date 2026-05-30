@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Detail Pesan</h1>
    <a href="{{ route('admin.messages.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-4">
        <label class="text-sm text-gray-500">Dari</label>
        <p class="text-lg font-medium">{{ $message->nama }}</p>
    </div>
    
    <div class="mb-4">
        <label class="text-sm text-gray-500">Email</label>
        <p class="text-lg">{{ $message->email }}</p>
    </div>
    
    <div class="mb-4">
        <label class="text-sm text-gray-500">Dikirim pada</label>
        <p class="text-gray-700">{{ $message->created_at->format('d M Y, H:i') }}</p>
    </div>
    
    <div class="mb-4">
        <label class="text-sm text-gray-500">Pesan</label>
        <div class="mt-2 p-4 bg-gray-50 rounded-lg">
            <p class="whitespace-pre-wrap">{{ $message->pesan }}</p>
        </div>
    </div>
    
    <div class="mt-6 flex gap-3">
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="return confirm('Yakin hapus pesan ini?')">
                <i class="fas fa-trash mr-2"></i>Hapus Pesan
            </button>
        </form>
        
        <a href="mailto:{{ $message->email }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-reply mr-2"></i>Balas Email
        </a>
    </div>
</div>
@endsection