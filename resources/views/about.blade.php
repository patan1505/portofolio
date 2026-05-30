@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-6 md:px-12">
    <div class="max-w-4xl mx-auto">
        
        {{-- Navbar di atas (sama seperti beranda) --}}
        <nav class="mb-12 border-b border-gray-200 pb-4">
            <div class="flex justify-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="{{ route('about') }}" class="text-blue-600 font-semibold">Tentang</a>
                <a href="{{ route('projects') }}" class="text-gray-600 hover:text-blue-600">Project</a>
                <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600">Kontak</a>
            </div>
        </nav>
        
        {{-- Judul Halaman --}}
        <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Tentang Saya</h1>
        <div class="w-20 h-1 bg-blue-600 mx-auto mb-12"></div>
        
        {{-- Edukasi --}}
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-graduation-cap text-blue-600 mr-3"></i> Edukasi
            </h2>
            <p class="text-gray-700"><strong>{{ $profile->edukasi_sekolah ?? 'SMK Negeri 2 Padang Panjang' }}</strong></p>
            <p class="text-gray-600">{{ $profile->edukasi_jurusan ?? 'Rekayasa Perangkat Lunak (RPL)' }}</p>
        </div>
        
        {{-- Cerita Perjalanan --}}
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-road text-blue-600 mr-3"></i> Perjalanan Saya
            </h2>
            <p class="text-gray-700 leading-relaxed">{{ $profile->cerita_perjalanan ?? 'Saya memulai perjalanan coding dari SMK...' }}</p>
        </div>
        
        {{-- Keahlian & Tech Stack --}}
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-code text-blue-600 mr-3"></i> Keahlian & Tech Stack
            </h2>
            <div class="flex flex-wrap gap-2">
                @foreach($skills as $skill)
                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $skill->nama }}</span>
                @endforeach
            </div>
        </div>
        
        {{-- Prestasi --}}
        @if($achievements->count() > 0)
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-trophy text-blue-600 mr-3"></i> Prestasi
            </h2>
            <div class="space-y-4">
                @foreach($achievements as $achievement)
                <div class="border-l-4 border-blue-600 pl-4">
                    <h3 class="font-semibold text-gray-800">{{ $achievement->nama_prestasi }}</h3>
                    <p class="text-sm text-gray-500">{{ $achievement->tahun }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $achievement->deskripsi }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        {{-- Sisi Personal (Hobi) --}}
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-heart text-blue-600 mr-3"></i> Di Luar Coding
            </h2>
            <div class="space-y-2">
                <p class="text-gray-700"><i class="fas fa-fish text-blue-500 mr-2"></i> {{ $profile->hobi_1 ?? 'Memancing' }}</p>
                <p class="text-gray-700"><i class="fas fa-music text-blue-500 mr-2"></i> {{ $profile->hobi_2 ?? 'Mengelola blog lirik lagu' }}</p>
            </div>
            @if($profile->motto)
            <div class="mt-4 pt-4 border-t border-gray-100">
                <p class="text-gray-500 italic">"{{ $profile->motto }}"</p>
            </div>
            @endif
        </div>
        
        {{-- Galeri Foto (jika ada) --}}
        @if($galleries->count() > 0)
        <div class="bg-white rounded-xl shadow-md p-6 mt-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-images text-blue-600 mr-3"></i> Galeri Kegiatan
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                <div class="rounded-lg overflow-hidden shadow">
                    <img src="{{ asset('storage/' . $gallery->foto) }}" alt="{{ $gallery->judul }}" class="w-full h-32 object-cover">
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
    </div>
</div>
@endsection