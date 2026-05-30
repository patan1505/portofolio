@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.social-links.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Social Media Link</h1>
    
    <form action="{{ route('admin.social-links.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Platform <span class="text-red-500">*</span></label>
            <select name="platform" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
                <option value="">-- Pilih Platform --</option>
                <option value="GitHub">GitHub</option>
                <option value="LinkedIn">LinkedIn</option>
        <option value="Instagram">Instagram</option>
                <option value="Blog">Blog</option>
                <option value="Twitter">Twitter</option>
                <option value="Facebook">Facebook</option>
                <option value="YouTube">YouTube</option>
                <option value="TikTok">TikTok</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">URL <span class="text-red-500">*</span></label>
            <input type="url" name="url" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                   placeholder="https://github.com/username" required>
            <p class="text-xs text-gray-500 mt-1">Masukkan link lengkap (termasuk https://)</p>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Urutan Tampil</label>
            <input type="number" name="urutan" value="0" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin atas tampilnya</p>
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.social-links.index') }}" 
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