@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.social-links.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Social Media Link</h1>
    
    <form action="{{ route('admin.social-links.update', $socialLink) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Platform <span class="text-red-500">*</span></label>
            <select name="platform" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
                <option value="GitHub" {{ $socialLink->platform == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                <option value="LinkedIn" {{ $socialLink->platform == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                <option value="Instagram" {{ $socialLink->platform == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                <option value="Blog" {{ $socialLink->platform == 'Blog' ? 'selected' : '' }}>Blog</option>
                <option value="Twitter" {{ $socialLink->platform == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                <option value="Facebook" {{ $socialLink->platform == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                <option value="YouTube" {{ $socialLink->platform == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                <option value="TikTok" {{ $socialLink->platform == 'TikTok' ? 'selected' : '' }}>TikTok</option>
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">URL <span class="text-red-500">*</span></label>
            <input type="url" name="url" value="{{ old('url', $socialLink->url) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" required>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Urutan Tampil</label>
            <input type="number" name="urutan" value="{{ old('urutan', $socialLink->urutan) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.social-links.index') }}" 
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