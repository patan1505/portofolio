@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Prestasi</h1>
    <a href="{{ route('admin.achievements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Prestasi
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sertifikat</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($achievements as $achievement)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-yellow-600"></i>
                            </div>
                            <span class="font-medium text-gray-800">{{ $achievement->nama_prestasi }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-gray-100 rounded-full text-xs font-medium">
                            {{ $achievement->tahun }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600 text-sm">
                        {{ Str::limit($achievement->deskripsi, 60) }}
                    </td>
                    <td class="px-6 py-4">
                        @if($achievement->sertifikat)
                            <a href="{{ asset('storage/' . $achievement->sertifikat) }}" target="_blank" 
                               class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-file-pdf mr-1"></i> Lihat
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.achievements.edit', $achievement) }}" 
                               class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition"
                                        onclick="return confirm('Yakin ingin menghapus prestasi {{ $achievement->nama_prestasi }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-trophy text-4xl mb-3 block"></i>
                        <p>Belum ada data prestasi</p>
                        <a href="{{ route('admin.achievements.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambah prestasi pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection