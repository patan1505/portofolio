@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.achievements.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Prestasi Baru</h1>
    
    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nama Prestasi <span class="text-red-500">*</span></label>
            <input type="text" name="nama_prestasi" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   placeholder="Contoh: Juara 1 Lomba Web Development" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Tahun <span class="text-red-500">*</span></label>
            <input type="text" name="tahun" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   placeholder="2024" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" 
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                      placeholder="Ceritakan detail prestasi ini..."></textarea>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Upload Sertifikat (opsional)</label>
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
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection