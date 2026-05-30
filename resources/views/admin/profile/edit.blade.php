@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Kelola Beranda & Profil</h1>

<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div>
                <h3 class="font-semibold text-gray-800 mb-4 border-b pb-2">Foto Profil</h3>
                <div class="mb-4">
                    @if($profile->foto_profil)
                        <img src="{{ asset('storage/' . $profile->foto_profil) }}" class="w-32 h-32 rounded-full object-cover mb-3">
                    @endif
                    <label class="block text-gray-700 mb-2">Ganti Foto Profil</label>
                    <input type="file" name="foto_profil" class="w-full border rounded px-3 py-2">
                    <p class="text-xs text-gray-500 mt-1">Max 2MB (JPG, PNG)</p>
                </div>
                
                <h3 class="font-semibold text-gray-800 mb-4 border-b pb-2 mt-6">Teks Hero (Kiri & Kanan)</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kiri Baris 1</label>
                    <input type="text" name="teks_kiri_1" value="{{ old('teks_kiri_1', $profile->teks_kiri_1) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kiri Baris 2</label>
                    <input type="text" name="teks_kiri_2" value="{{ old('teks_kiri_2', $profile->teks_kiri_2) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kiri Baris 3</label>
                    <input type="text" name="teks_kiri_3" value="{{ old('teks_kiri_3', $profile->teks_kiri_3) }}" class="w-full border rounded px-3 py-2">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kanan Baris 1</label>
                    <input type="text" name="teks_kanan_1" value="{{ old('teks_kanan_1', $profile->teks_kanan_1) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kanan Baris 2</label>
                    <input type="text" name="teks_kanan_2" value="{{ old('teks_kanan_2', $profile->teks_kanan_2) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Teks Kanan Baris 3</label>
                    <input type="text" name="teks_kanan_3" value="{{ old('teks_kanan_3', $profile->teks_kanan_3) }}" class="w-full border rounded px-3 py-2">
                </div>
            </div>
            
            <!-- Kolom Kanan -->
            <div>
                <h3 class="font-semibold text-gray-800 mb-4 border-b pb-2">Informasi Dasar</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $profile->nama_lengkap) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}" class="w-full border rounded px-3 py-2">
                </div>
                
                <h3 class="font-semibold text-gray-800 mb-4 border-b pb-2 mt-6">Tentang Saya</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Cerita Perjalanan</label>
                    <textarea name="cerita_perjalanan" rows="4" class="w-full border rounded px-3 py-2">{{ old('cerita_perjalanan', $profile->cerita_perjalanan) }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Edukasi - Sekolah</label>
                    <input type="text" name="edukasi_sekolah" value="{{ old('edukasi_sekolah', $profile->edukasi_sekolah) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Edukasi - Jurusan</label>
                    <input type="text" name="edukasi_jurusan" value="{{ old('edukasi_jurusan', $profile->edukasi_jurusan) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Hobi 1</label>
                    <input type="text" name="hobi_1" value="{{ old('hobi_1', $profile->hobi_1) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Hobi 2</label>
                    <input type="text" name="hobi_2" value="{{ old('hobi_2', $profile->hobi_2) }}" class="w-full border rounded px-3 py-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Motto</label>
                    <input type="text" name="motto" value="{{ old('motto', $profile->motto) }}" class="w-full border rounded px-3 py-2">
                </div>
                
                <h3 class="font-semibold text-gray-800 mb-4 border-b pb-2 mt-6">Kontak Informasi</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email Aktif</label>
                    <input type="email" name="email_aktif" value="{{ old('email_aktif', $profile->email_aktif) }}" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Lokasi (Domisili)</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $profile->lokasi) }}" class="w-full border rounded px-3 py-2">
                </div>
            </div>
        </div>
        
        <div class="mt-6 text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection