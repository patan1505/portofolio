@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

<div class="grid md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Project</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalProjects }}</p>
            </div>
            <i class="fas fa-folder-open text-4xl text-blue-500"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Pesan</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalMessages }}</p>
            </div>
            <i class="fas fa-envelope text-4xl text-green-500"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Pesan Belum Dibaca</p>
                <p class="text-3xl font-bold text-red-600">{{ $unreadMessages }}</p>
            </div>
            <i class="fas fa-envelope-open text-4xl text-red-500"></i>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Prestasi</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalAchievements }}</p>
            </div>
            <i class="fas fa-trophy text-4xl text-yellow-500"></i>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-4 border-b">
        <h2 class="font-semibold text-gray-800">Pesan Terbaru</h2>
    </div>
    <div class="divide-y">
        @forelse($latestMessages as $message)
        <div class="p-4 flex justify-between items-center">
            <div>
                <p class="font-medium">{{ $message->nama }}</p>
                <p class="text-sm text-gray-500">{{ $message->email }}</p>
                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($message->pesan, 50) }}</p>
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</span>
                <br>
                <a href="{{ route('admin.messages.show', $message) }}" class="text-sm text-blue-600 hover:underline">Lihat</a>
            </div>
        </div>
        @empty
        <div class="p-4 text-center text-gray-500">Belum ada pesan masuk</div>
        @endforelse
    </div>
</div>
@endsection