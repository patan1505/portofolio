@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Project</h1>
    <a href="{{ route('admin.projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Project
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
@endif

<div class="grid gap-4">
    @forelse($projects as $project)
    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition">
        <div class="p-5">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-gray-800">{{ $project->judul }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit($project->deskripsi, 120) }}</p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        @php
                            $techs = explode(',', $project->tech_stack ?? '');
                        @endphp
                        @foreach($techs as $tech)
                            @if(trim($tech))
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ trim($tech) }}</span>
                            @endif
                        @endforeach
                        <span class="text-xs px-2 py-1 rounded
                            @if($project->status == 'Selesai') bg-green-100 text-green-700
                            @elseif($project->status == 'Dalam Pengembangan') bg-yellow-100 text-yellow-700
                            @else bg-blue-100 text-blue-700
                            @endif">
                            {{ $project->status }}
                        </span>
                    </div>
                    <div class="flex gap-4 mt-3">
                        @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" class="text-xs text-blue-600 hover:underline">
                                <i class="fas fa-external-link-alt mr-1"></i> Demo
                            </a>
                        @endif
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="text-xs text-gray-600 hover:underline">
                                <i class="fab fa-github mr-1"></i> GitHub
                            </a>
                        @endif
                    </div>
                </div>
                <div class="flex gap-2 ml-4">
                    <a href="{{ route('admin.projects.edit', $project) }}" 
                       class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition"
                                onclick="return confirm('Yakin ingin menghapus project {{ $project->judul }}?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-xl shadow-md p-12 text-center text-gray-500">
        <i class="fas fa-folder-open text-5xl mb-3 block"></i>
        <p>Belum ada project yang ditambahkan</p>
        <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambah project pertama</a>
    </div>
    @endforelse
</div>
@endsection