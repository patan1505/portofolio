@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.skills.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Skill</h1>
    
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama Skill <span class="text-red-500">*</span></label>
            <input type="text" name="nama" value="{{ old('nama', $skill->nama) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Kategori</label>
            <select name="kategori" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                <option value="Back-End" {{ $skill->kategori == 'Back-End' ? 'selected' : '' }}>Back-End</option>
                <option value="Front-End" {{ $skill->kategori == 'Front-End' ? 'selected' : '' }}>Front-End</option>
                <option value="Database" {{ $skill->kategori == 'Database' ? 'selected' : '' }}>Database</option>
                <option value="Tools" {{ $skill->kategori == 'Tools' ? 'selected' : '' }}>Tools</option>
            </select>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $skill->urutan) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin atas tampilnya di halaman publik</p>
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.skills.index') }}" 
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition">
                Batal
            </a>
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                <i class="fas fa-save mr-2"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection