@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-6 md:px-12">
    <div class="max-w-6xl mx-auto">
        
        {{-- Navbar --}}
        <nav class="mb-12 border-b border-gray-200 pb-4">
            <div class="flex justify-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600">Tentang</a>
                <a href="{{ route('projects') }}" class="text-blue-600 font-semibold">Project</a>
                <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600">Kontak</a>
            </div>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-4">Project & Karya</h1>
        <div class="w-20 h-1 bg-blue-600 mx-auto mb-12"></div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                @if($project->screenshot && file_exists(public_path('storage/' . $project->screenshot)))
                    <img src="{{ asset('storage/' . $project->screenshot) }}" alt="{{ $project->judul }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white">
                        <i class="fas fa-code text-5xl"></i>
                    </div>
                @endif
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800">{{ $project->judul }}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($project->deskripsi, 100) }}</p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        @php
                            $techs = is_array($project->tech_stack) ? $project->tech_stack : explode(',', $project->tech_stack ?? '');
                        @endphp
                        @foreach($techs as $tech)
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                    <div class="mt-4 flex gap-3">
                        @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" class="text-sm text-blue-600 hover:underline">
                                <i class="fas fa-external-link-alt mr-1"></i>Demo
                            </a>
                        @endif
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="text-sm text-gray-700 hover:underline">
                                <i class="fab fa-github mr-1"></i>GitHub
                            </a>
                        @endif
                        <a href="{{ route('project.detail', $project->id) }}" class="text-sm text-gray-500 hover:underline">
                            <i class="fas fa-info-circle mr-1"></i>Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-12">
                <i class="fas fa-folder-open text-5xl mb-3"></i>
                <p>Belum ada project yang ditambahkan.</p>
                <p class="text-sm mt-2">Login sebagai admin untuk menambahkan project.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection