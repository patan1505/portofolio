@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Galeri Foto</h1>
    <a href="{{ route('admin.galleries.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Foto
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <div class="relative h-48 overflow-hidden">
            <img src="{{ asset('storage/' . $gallery->foto) }}" 
                 alt="{{ $gallery->judul }}" 
                 class="w-full h-full object-cover">
        </div>
        <div class="p-4">
            <h3 class="font-medium text-gray-800 mb-2">{{ Str::limit($gallery->judul, 40) }}</h3>
            <div class="flex justify-between items-center">
                <span class="text-xs text-gray-500">Urutan: {{ $gallery->urutan }}</span>
                <div class="flex gap-2">
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                       class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition"
                                onclick="return confirm('Yakin ingin menghapus foto ini?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full bg-white rounded-xl shadow-md p-12 text-center text-gray-500">
        <i class="fas fa-images text-5xl mb-3 block"></i>
        <p>Belum ada foto di galeri</p>
        <a href="{{ route('admin.galleries.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambah foto pertama</a>
    </div>
    @endforelse
</div>
@endsection