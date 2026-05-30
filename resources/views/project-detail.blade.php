@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-6 md:px-12">
    <div class="max-w-4xl mx-auto">
        
        {{-- Navbar --}}
        <nav class="mb-8 border-b border-gray-200 pb-4">
            <div class="flex justify-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600">Tentang</a>
                <a href="{{ route('projects') }}" class="text-blue-600 font-semibold">Project</a>
                <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600">Kontak</a>
            </div>
        </nav>
        
        <nav class="mb-6">
            <a href="{{ route('projects') }}" class="text-blue-600 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Project
            </a>
        </nav>
        
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            @if($project->screenshot && file_exists(public_path('storage/' . $project->screenshot)))
                <img src="{{ asset('storage/' . $project->screenshot) }}" alt="{{ $project->judul }}" class="w-full">
            @endif
            <div class="p-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $project->judul }}</h1>
                
                <div class="flex flex-wrap gap-2 mt-3">
                    @php
                        $techs = is_array($project->tech_stack) ? $project->tech_stack : explode(',', $project->tech_stack ?? '');
                    @endphp
                    @foreach($techs as $tech)
                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
                    @endforeach
                </div>
                
                <div class="mt-4 flex items-center gap-2">
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-calendar-alt mr-1"></i>{{ $project->created_at->format('d M Y') }}
                    </span>
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($project->status == 'Selesai') bg-green-100 text-green-700
                        @elseif($project->status == 'Dalam Pengembangan') bg-yellow-100 text-yellow-700
                        @else bg-blue-100 text-blue-700
                        @endif">
                        {{ $project->status }}
                    </span>
                </div>
                
                <p class="text-gray-700 mt-6 leading-relaxed">{{ $project->deskripsi }}</p>
                
                @if($project->video_link)
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-3">Video Preview</h3>
                    <div class="aspect-w-16 aspect-h-9">
                        @php
                            $videoId = null;
                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $project->video_link, $matches)) {
                                $videoId = $matches[1];
                            }
                        @endphp
                        @if($videoId)
                            <iframe src="https://www.youtube.com/embed/{{ $videoId }}" class="w-full h-64 rounded-lg" allowfullscreen></iframe>
                        @else
                            <a href="{{ $project->video_link }}" target="_blank" class="text-blue-600 hover:underline">Tonton video di YouTube</a>
                        @endif
                    </div>
                </div>
                @endif
                
                <div class="flex gap-4 mt-8 pt-4 border-t">
                    @if($project->demo_link)
                        <a href="{{ $project->demo_link }}" target="_blank" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-external-link-alt mr-2"></i>Lihat Demo Live
                        </a>
                    @endif
                    @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-900 transition">
                            <i class="fab fa-github mr-2"></i>Lihat Source Code
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection