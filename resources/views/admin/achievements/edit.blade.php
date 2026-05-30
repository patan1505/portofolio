@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.achievements.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Prestasi</h1>
    
    <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama Prestasi <span class="text-red-500">*</span></label>
            <input type="text" name="nama_prestasi" value="{{ old('nama_prestasi', $achievement->nama_prestasi) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Tahun <span class="text-red-500">*</span></label>
            <input type="text" name="tahun" value="{{ old('tahun', $achievement->tahun) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" 
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">{{ old('deskripsi', $achievement->deskripsi) }}</textarea>
        </div>
        
        @if($achievement->sertifikat)
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Sertifikat Saat Ini</label>
            <a href="{{ asset('storage/' . $achievement->sertifikat) }}" target="_blank" 
               class="text-blue-600 hover:underline flex items-center gap-2">
                <i class="fas fa-file-alt"></i> Lihat Sertifikat
            </a>
        </div>
        @endif
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Ganti Sertifikat (opsional)</label>
            <input type="file" name="sertifikat" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Max 2MB (JPG, PNG)</p>
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.achievements.index') }}" 
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