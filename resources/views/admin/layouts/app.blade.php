<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Paduka Raja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="p-4 border-b border-gray-700">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <p class="text-sm text-gray-400">Paduka Raja</p>
            </div>
            
            <nav class="flex-1 py-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-user w-5 mr-3"></i> Kelola Beranda & Profil
                </a>
                <a href="{{ route('admin.skills.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-code w-5 mr-3"></i> Kelola Keahlian
                </a>
                <a href="{{ route('admin.achievements.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-trophy w-5 mr-3"></i> Kelola Prestasi
                </a>
                <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-folder-open w-5 mr-3"></i> Kelola Project
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-images w-5 mr-3"></i> Kelola Galeri
                </a>
                <a href="{{ route('admin.social-links.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-share-alt w-5 mr-3"></i> Kelola Sosial Media
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="fas fa-envelope w-5 mr-3"></i> Lihat Pesan Masuk
                </a>
            </nav>
            
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-gray-300 hover:text-white transition">
                        <i class="fas fa-sign-out-alt w-5 mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-6">
                {{-- NOTIFIKASI SUDAH DIPINDAHKAN KE MASING-MASING HALAMAN --}}
                @yield('content')
            </div>
        </main>
    </div>
    
</body>
</html>