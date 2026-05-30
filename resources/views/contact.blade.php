@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-6 md:px-12">
    <div class="max-w-4xl mx-auto">
        
        {{-- Navbar --}}
        <nav class="mb-12 border-b border-gray-200 pb-4">
            <div class="flex justify-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600">Tentang</a>
                <a href="{{ route('projects') }}" class="text-gray-600 hover:text-blue-600">Project</a>
                <a href="{{ route('contact') }}" class="text-blue-600 font-semibold">Kontak</a>
            </div>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Hubungi Saya</h1>
        <div class="w-20 h-1 bg-blue-600 mx-auto mb-12"></div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div class="grid md:grid-cols-2 gap-8">
            
            {{-- Informasi Kontak --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Informasi Kontak</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-blue-600 w-6"></i>
                        <span class="text-gray-700">{{ $profile->email_aktif ?? 'padukaraja@email.com' }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-600 w-6"></i>
                        <span class="text-gray-700">{{ $profile->lokasi ?? 'Padang Panjang' }}</span>
                    </div>
                </div>
                
                <h3 class="font-semibold text-gray-800 mt-6 mb-3">Ikuti Saya</h3>
                <div class="flex gap-4">
                    @forelse($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" class="text-gray-600 hover:text-blue-600 transition text-2xl">
                        @if(strtolower($link->platform) == 'github')
                            <i class="fab fa-github"></i>
                        @elseif(strtolower($link->platform) == 'linkedin')
                            <i class="fab fa-linkedin"></i>
                        @elseif(strtolower($link->platform) == 'instagram')
                            <i class="fab fa-instagram"></i>
                        @elseif(strtolower($link->platform) == 'blog')
                            <i class="fas fa-blog"></i>
                        @else
                            <i class="fas fa-link"></i>
                        @endif
                    </a>
                    @empty
                        <p class="text-gray-500 text-sm">Belum ada link sosial media</p>
                    @endforelse
                </div>
            </div>
            
            {{-- Form Kontak --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Kirim Pesan</h2>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Pesan</label>
                        <textarea name="pesan" rows="4" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">{{ old('pesan') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection