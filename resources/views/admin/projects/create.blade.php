@extends('admin.layouts.app')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:text-blue-800">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Project Baru</h1>
    
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid md:grid-cols-2 gap-6">
            <!-- KOLOM KIRI -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Judul Project <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           placeholder="Contoh: Aplikasi Nutrobot" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Tech Stack</label>
                    <input type="text" name="tech_stack" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           placeholder="Contoh: Laravel, MySQL, TailwindCSS">
                    <p class="text-xs text-gray-500 mt-1">Pisahkan dengan koma (,) jika lebih dari satu</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option value="Selesai">✅ Selesai</option>
                        <option value="Dalam Pengembangan">🔄 Dalam Pengembangan</option>
                        <option value="Mencari Kolaborasi">🤝 Mencari Kolaborasi</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Link Demo <span class="text-gray-400 text-sm">(opsional)</span></label>
                    <input type="url" name="demo_link" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           placeholder="https://namaproject.com">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ada demo live</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Link GitHub <span class="text-gray-400 text-sm">(opsional)</span></label>
                    <input type="url" name="github_link" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           placeholder="https://github.com/username/nama-project">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin menampilkan link GitHub</p>
                </div>
            </div>
            
            <!-- KOLOM KANAN -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" rows="5" 
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                              placeholder="Ceritakan tentang project ini..."></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Screenshot / Thumbnail</label>
                    <input type="file" name="screenshot" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           accept="image/jpeg,image/png,image/jpg">
                    <p class="text-xs text-gray-500 mt-1">Max 2MB (JPG, PNG, JPEG). Ukuran推薦: 800x500px</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Link Video (YouTube) <span class="text-gray-400 text-sm">(opsional)</span></label>
                    <input type="url" name="video_link" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                           placeholder="https://youtube.com/watch?v=...">
                    <p class="text-xs text-gray-500 mt-1">Masukkan link YouTube untuk preview video</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Urutan Tampil</label>
                    <input type="number" name="urutan" value="0" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin atas tampilnya</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
            <a href="{{ route('admin.projects.index') }}" 
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-lg transition">
                Batal
            </a>
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
                <i class="fas fa-save mr-2"></i> Simpan Project
            </button>
        </div>
    </form>
</div>
@endsection