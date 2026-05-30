@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Sosial Media</h1>
    <a href="{{ route('admin.social-links.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Link
    </a>
</div>

{{-- HANYA SATU NOTIFIKASI --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Platform</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Urutan</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($socialLinks as $link)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center
                                @if(strtolower($link->platform) == 'github') bg-gray-800 text-white
                                @elseif(strtolower($link->platform) == 'linkedin') bg-blue-700 text-white
                                @elseif(strtolower($link->platform) == 'instagram') bg-pink-600 text-white
                                @elseif(strtolower($link->platform) == 'blog') bg-orange-500 text-white
                                @elseif(strtolower($link->platform) == 'youtube') bg-red-600 text-white
                                @else bg-gray-500 text-white
                                @endif">
                                @if(strtolower($link->platform) == 'github')
                                    <i class="fab fa-github"></i>
                                @elseif(strtolower($link->platform) == 'linkedin')
                                    <i class="fab fa-linkedin-in"></i>
                                @elseif(strtolower($link->platform) == 'instagram')
                                    <i class="fab fa-instagram"></i>
                                @elseif(strtolower($link->platform) == 'blog')
                                    <i class="fas fa-blog"></i>
                                @elseif(strtolower($link->platform) == 'youtube')
                                    <i class="fab fa-youtube"></i>
                                @elseif(strtolower($link->platform) == 'twitter')
                                    <i class="fab fa-twitter"></i>
                                @elseif(strtolower($link->platform) == 'facebook')
                                    <i class="fab fa-facebook-f"></i>
                                @else
                                    <i class="fas fa-link"></i>
                                @endif
                            </div>
                            <span class="font-medium text-gray-800">{{ $link->platform }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ $link->url }}" target="_blank" 
                           class="text-blue-600 hover:text-blue-800 text-sm">
                            {{ Str::limit($link->url, 40) }}
                            <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="w-8 h-8 bg-gray-100 rounded-full inline-flex items-center justify-center text-sm">
                            {{ $link->urutan }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.social-links.edit', $link) }}" 
                               class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition"
                                        onclick="return confirm('Yakin ingin menghapus link {{ $link->platform }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-share-alt text-4xl mb-3 block"></i>
                        <p>Belum ada data sosial media</p>
                        <a href="{{ route('admin.social-links.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambah link pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection