@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Pesan Masuk dari Form Kontak</h1>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pesan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($messages as $message)
            <tr class="{{ !$message->is_read ? 'bg-blue-50' : '' }}">
                <td class="px-6 py-4 font-medium">{{ $message->nama }}</td>
                <td class="px-6 py-4">{{ $message->email }}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($message->pesan, 50) }}</td>
                <td class="px-6 py-4">
                    @if($message->is_read)
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">Sudah Dibaca</span>
                    @else
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded">Belum Dibaca</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.messages.show', $message) }}" class="text-blue-600 hover:text-blue-800 mr-3">Detail</a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin hapus pesan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $messages->links() }}
</div>
@endsection