@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg shadow-lg p-8 mb-8 text-white">
    <h1 class="text-3xl font-bold mb-2">Selamat Datang di Sistem Penilaian Kantin Ramah Lingkungan 🌱</h1>
    <p class="text-green-100 text-lg">Sistem ini membantu Anda mengevaluasi dan memberikan peringkat pada kantin-kantin berdasarkan standar pengelolaan sampah dan pelestarian lingkungan. Berikan penilaian Anda untuk mewujudkan lingkungan yang lebih hijau!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Card Total Penilaian -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-green-100 text-sm font-semibold">Penilaian Saya</p>
                <h3 class="text-4xl font-bold mt-2">{{ $totalPenilaian }}</h3>
            </div>
            <i class="fas fa-edit text-4xl text-green-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Perhitungan -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-blue-100 text-sm font-semibold">Perhitungan</p>
                <h3 class="text-4xl font-bold mt-2">{{ $totalPerhitungan }}</h3>
            </div>
            <i class="fas fa-calculator text-4xl text-blue-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Jumlah Kantin -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-purple-100 text-sm font-semibold">Total Kantin</p>
                <h3 class="text-4xl font-bold mt-2">{{ $alternatif }}</h3>
            </div>
            <i class="fas fa-store text-4xl text-purple-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Jumlah Kriteria -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-orange-100 text-sm font-semibold">Total Kriteria</p>
                <h3 class="text-4xl font-bold mt-2">{{ $kriteria }}</h3>
            </div>
            <i class="fas fa-list text-4xl text-orange-200 opacity-30"></i>
        </div>
    </div>
</div>

<!-- Kantin Terbaik & Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">🏆 Kantin Terbaik (Penilaian Anda)</h2>
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg p-8 text-white text-center">
            <i class="fas fa-trophy text-6xl mb-4"></i>
            <p class="text-2xl font-bold">{{ $alternatifTerbaik }}</p>
            <p class="text-sm text-yellow-100 mt-2">Berdasarkan skor ramah lingkungan tertinggi</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">⚡ Aksi Cepat</h2>
        <div class="space-y-3">
            <a href="{{ route('penilaian.create') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-plus"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-900">Input Penilaian Baru</p>
                    <p class="text-sm text-gray-500">Beri penilaian untuk kantin</p>
                </div>
            </a>
            <a href="{{ route('perhitungan') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-calculator"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-900">Evaluasi Kantin</p>
                    <p class="text-sm text-gray-500">Mulai evaluasi kriteria</p>
                </div>
            </a>
            <a href="{{ route('ranking') }}" class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-trophy"></i>
                </div>
                <div>
                    <p class="font-bold text-gray-900">Lihat Ranking</p>
                    <p class="text-sm text-gray-500">Lihat ranking kantin</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Ranking Milik User -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">🎯 Ranking Kantin (Penilaian Anda)</h2>
    
    @if ($ranking->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-50 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Ranking</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-900">Nama Kantin</th>
                        <th class="px-6 py-4 text-right text-sm font-bold text-gray-900">Skor Akhir</th>
                        <th class="px-6 py-4 text-center text-sm font-bold text-gray-900">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ranking as $index => $rank)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-center">
                                @if ($index === 0)
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-yellow-400 text-white rounded-full font-bold text-lg">🥇</span>
                                @elseif ($index === 1)
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-full font-bold text-lg">🥈</span>
                                @elseif ($index === 2)
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-orange-500 text-white rounded-full font-bold text-lg">🥉</span>
                                @else
                                    <span class="font-bold">{{ $index + 1 }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                <i class="fas fa-store text-green-600 mr-2"></i>{{ $rank->alternatif->nama_alternatif }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-bold text-lg text-gray-900">{{ number_format($rank->nilai_akhir, 4) }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($index === 0)
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">🌟 TERBAIK</span>
                                @else
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Terukur</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12 text-gray-500">
            <i class="fas fa-info-circle text-5xl mb-3 block text-gray-300"></i>
            <p class="text-lg mb-4">Belum ada hasil perhitungan</p>
            <a href="{{ route('penilaian.create') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition">
                ▶ Mulai Input Penilaian
            </a>
        </div>
    @endif
</div>
@endsection
