@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galleries.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Foto Galeri</h1>
    
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Foto Saat Ini</label>
            <div class="w-40 h-40 rounded-lg overflow-hidden border">
                <img src="{{ asset('storage/' . $gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-full object-cover">
            </div>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Judul Foto <span class="text-red-500">*</span></label>
            <input type="text" name="judul" value="{{ old('judul', $gallery->judul) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Ganti Foto (opsional)</label>
            <input type="file" name="foto" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   accept="image/jpeg,image/png,image/jpg">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti foto</p>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $gallery->urutan) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.galleries.index') }}" 
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