<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPK Kantin Ramah Lingkungan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white min-h-screen fixed">
            <div class="p-6 border-b border-gray-800">
                <h2 class="text-xl font-bold flex items-center text-white">
                    <i class="fas fa-leaf text-green-400 mr-2"></i> Penilaian Kantin
                </h2>
                <p class="text-xs text-green-400 mt-1 font-semibold">Standar Ramah Lingkungan</p>
            </div>

            <nav class="mt-8">
                @if(Auth::user()->isAdmin())
                    {{-- ===================== SIDEBAR ADMIN ===================== --}}
                    <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('admin.dashboard') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-chart-bar mr-3"></i> Dashboard
                    </a>
                    <a href="{{ route('alternatif.index') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('alternatif.*') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-store mr-3"></i> Kelola Alternatif
                    </a>
                    <a href="{{ route('kriteria.index') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('kriteria.*') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-list mr-3"></i> Kelola Kriteria
                    </a>
                    <a href="{{ route('sub-kriteria.index') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('sub-kriteria.*') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-tags mr-3"></i> Kelola Sub Kriteria
                    </a>
                    <a href="{{ route('user.index') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('user.*') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-users mr-3"></i> Manajemen User
                    </a>
                    <a href="{{ route('admin.profil') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('admin.profil') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-user-cog mr-3"></i> Profil Akun
                    </a>
                @else
                    {{-- ===================== SIDEBAR USER ===================== --}}
                    <a href="{{ route('user.dashboard') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('user.dashboard') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-chart-bar mr-3"></i> Dashboard
                    </a>
                    <a href="{{ route('penilaian.index') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('penilaian.*') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-edit mr-3"></i> Input Penilaian
                    </a>
                    <a href="{{ route('perhitungan') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('perhitungan') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-calculator mr-3"></i> Evaluasi Kantin
                    </a>
                    <a href="{{ route('ranking') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('ranking') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-trophy mr-3"></i> Ranking
                    </a>
                    <a href="{{ route('riwayat') }}" class="block px-6 py-3 hover:bg-gray-800 {{ Route::is('riwayat') ? 'bg-green-600' : '' }}">
                        <i class="fas fa-history mr-3"></i> Riwayat
                    </a>
                @endif
            </nav>

            <div class="absolute bottom-0 w-64 p-6 border-t border-gray-800">
                <div class="mb-3 text-sm text-gray-400">
                    <i class="fas fa-user mr-2"></i> {{ Auth::user()->name }}
                    <span class="ml-2 px-2 py-0.5 text-xs rounded {{ Auth::user()->isAdmin() ? 'bg-red-600 text-white' : 'bg-green-600 text-white' }}">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <div class="bg-white shadow">
                <div class="flex justify-between items-center px-8 py-4">
                    <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            <div class="px-8 pt-4">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
