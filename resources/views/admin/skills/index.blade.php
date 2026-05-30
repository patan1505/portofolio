@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Keahlian</h1>
    <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Skill
    </a>
</div>

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Skill</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urutan</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($skills as $skill)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-code text-blue-600 text-sm"></i>
                            </div>
                            <span class="font-medium text-gray-800">{{ $skill->nama }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $badgeColor = match($skill->kategori) {
                                'Back-End' => 'bg-purple-100 text-purple-700',
                                'Front-End' => 'bg-blue-100 text-blue-700',
                                'Database' => 'bg-green-100 text-green-700',
                                'Tools' => 'bg-gray-100 text-gray-700',
                                default => 'bg-gray-100 text-gray-700',
                            };
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $badgeColor }}">
                            {{ $skill->kategori }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        <span class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-sm">
                            {{ $skill->urutan }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.skills.edit', $skill) }}" 
                               class="text-blue-600 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition"
                                        onclick="return confirm('Yakin ingin menghapus skill {{ $skill->nama }}?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-code text-4xl mb-3 block"></i>
                        <p>Belum ada data keahlian</p>
                        <a href="{{ route('admin.skills.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambah skill pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 text-sm text-gray-500">
    <i class="fas fa-info-circle mr-1"></i> Urutan: semakin kecil angka, semakin atas tampilnya di halaman publik
</div>
@endsection