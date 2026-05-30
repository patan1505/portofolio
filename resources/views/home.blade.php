@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center px-6 md:px-12 py-12">
    
    {{-- HERO SECTION: Foto di tengah, kiri-kanan tulisan --}}
    <div class="max-w-5xl mx-auto">
        
        {{-- Baris 1: Teks kiri dan kanan --}}
<div class="flex justify-between items-start mb-8 text-center md:text-left">
    <div class="text-left flex-1">
        <p class="text-lg md:text-xl font-semibold text-gray-800">{{ $profile?->teks_kiri_1 ?? 'Web Developer' }}</p>
        <p class="text-sm md:text-base text-gray-600">{{ $profile?->teks_kiri_2 ?? 'PHP • Laravel' }}</p>
        <p class="text-sm text-gray-500 mt-2">{{ $profile?->teks_kiri_3 ?? 'Suka ngoding sejak SMK' }}</p>
    </div>
    
    <div class="text-right flex-1">
        <p class="text-lg md:text-xl font-semibold text-gray-800">{{ $profile?->teks_kanan_1 ?? 'Back-End Specialist' }}</p>
        <p class="text-sm md:text-base text-gray-600">{{ $profile?->teks_kanan_2 ?? 'MySQL • Git' }}</p>
        <p class="text-sm text-gray-500 mt-2">{{ $profile?->teks_kanan_3 ?? 'Suka mancing & nulis blog' }}</p>
    </div>
</div>
        
        {{-- Foto Profil di Tengah --}}
<div class="flex justify-center my-8">
    <div class="w-40 h-40 md:w-52 md:h-52 rounded-full overflow-hidden shadow-xl border-4 border-white bg-gray-200">
        @if(isset($profile) && $profile->foto_profil && file_exists(public_path('storage/' . $profile->foto_profil)))
            <img src="{{ asset('storage/' . $profile->foto_profil) }}" alt="Foto {{ $profile->nama_lengkap }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white text-4xl font-bold">
                {{ isset($profile) ? Str::upper(Str::substr($profile->nama_lengkap, 0, 2)) : 'PR' }}
            </div>
        @endif
    </div>
</div>
        
        {{-- Nama & Tagline --}}
        <div class="text-center mt-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $profile->nama_lengkap ?? 'Paduka Raja' }}</h1>
            @if($profile->tagline)
                <p class="text-gray-500 mt-1">{{ $profile->tagline }}</p>
            @endif
        </div>
        
        {{-- Tombol CTA --}}
        <div class="flex justify-center gap-4 mt-8">
            <a href="{{ route('projects') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition duration-300 shadow-md">
                <i class="fas fa-folder-open mr-2"></i>Lihat Project
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-2 rounded-full transition duration-300">
                <i class="fas fa-envelope mr-2"></i>Hubungi Saya
            </a>
        </div>
        
    </div>
    
    {{-- NAVBAR DI BAWAH HERO (sesuai Opsi 1) --}}
    <nav class="mt-16 border-t border-gray-200 pt-6">
        <div class="max-w-2xl mx-auto flex justify-center gap-8 md:gap-12">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Beranda</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('about') ? 'text-blue-600 font-semibold' : '' }}">Tentang</a>
            <a href="{{ route('projects') }}" class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('projects') ? 'text-blue-600 font-semibold' : '' }}">Project</a>
            <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 transition {{ request()->routeIs('contact') ? 'text-blue-600 font-semibold' : '' }}">Kontak</a>
        </div>
    </nav>
    
    {{-- Preview 3 Project Terbaru (opsional) --}}
    @if($latestProjects->count() > 0)
    <div class="max-w-6xl mx-auto mt-16">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Project Terbaru</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestProjects as $project)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                @if($project->screenshot && file_exists(public_path('storage/' . $project->screenshot)))
                    <img src="{{ asset('storage/' . $project->screenshot) }}" alt="{{ $project->judul }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white">
                        <i class="fas fa-code text-4xl"></i>
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $project->judul }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($project->deskripsi, 80) }}</p>
                    <div class="mt-3">
                        <span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $project->tech_stack }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('projects') }}" class="text-blue-600 hover:underline">Lihat semua project →</a>
        </div>
    </div>
    @endif
    
</div>
@endsection