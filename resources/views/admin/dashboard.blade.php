@extends('layouts.app')

@section('page-title', 'Dashboard Admin')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg shadow-lg p-8 mb-8 text-white">
    <h1 class="text-3xl font-bold mb-2">Sistem Penilaian Kantin Ramah Lingkungan 🌱</h1>
    <p class="text-gray-300 text-lg">Kelola dan pantau seluruh data kriteria, alternatif kantin, dan hasil evaluasi secara global. Sistem ini dirancang untuk memudahkan pengambilan keputusan menuju lingkungan yang lebih hijau.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
    <!-- Card Kriteria -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-green-100 text-sm font-semibold">Jumlah Kriteria</p>
                <h3 class="text-4xl font-bold mt-2">{{ $kriteria }}</h3>
            </div>
            <i class="fas fa-list text-4xl text-green-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Sub Kriteria -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-blue-100 text-sm font-semibold">Sub Kriteria</p>
                <h3 class="text-4xl font-bold mt-2">{{ $subKriteria }}</h3>
            </div>
            <i class="fas fa-tags text-4xl text-blue-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Alternatif -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-purple-100 text-sm font-semibold">Jumlah Kantin</p>
                <h3 class="text-4xl font-bold mt-2">{{ $alternatif }}</h3>
            </div>
            <i class="fas fa-store text-4xl text-purple-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Penilaian -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-orange-100 text-sm font-semibold">Data Penilaian</p>
                <h3 class="text-4xl font-bold mt-2">{{ $penilaian }}</h3>
            </div>
            <i class="fas fa-edit text-4xl text-orange-200 opacity-30"></i>
        </div>
    </div>

    <!-- Card Total User -->
    <div class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-teal-100 text-sm font-semibold">Total User</p>
                <h3 class="text-4xl font-bold mt-2">{{ $totalUser }}</h3>
            </div>
            <i class="fas fa-users text-4xl text-teal-200 opacity-30"></i>
        </div>
    </div>
</div>

<!-- Alternatif Terbaik & Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">🏆 Kantin Terbaik</h2>
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg p-8 text-white text-center">
            <i class="fas fa-trophy text-6xl mb-4"></i>
            <p class="text-2xl font-bold">{{ $alternatifTerbaik }}</p>
            <p class="text-sm text-yellow-100 mt-2">Berdasarkan skor ramah lingkungan tertinggi</p>
        </div>
    </div>

    <!-- Statistik Cepat -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">📊 Statistik</h2>
        <div class="space-y-4">
            <div class="flex justify-between items-center pb-4 border-b">
                <span class="text-gray-600">Total Kantin</span>
                <span class="font-bold text-lg text-green-600">{{ $alternatif }}</span>
            </div>
            <div class="flex justify-between items-center pb-4 border-b">
                <span class="text-gray-600">Total Kriteria</span>
                <span class="font-bold text-lg text-blue-600">{{ $kriteria }}</span>
            </div>
            <div class="flex justify-between items-center pb-4 border-b">
                <span class="text-gray-600">Total User</span>
                <span class="font-bold text-lg text-teal-600">{{ $totalUser }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Status Sistem</span>
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">✓ Aktif</span>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Ranking Kantin -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">🎯 Ranking Kantin Ramah Lingkungan</h2>
    
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
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-yellow-400 text-white rounded-full font-bold text-lg">
                                        🥇
                                    </span>
                                @elseif ($index === 1)
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-400 text-white rounded-full font-bold text-lg">
                                        🥈
                                    </span>
                                @elseif ($index === 2)
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-orange-500 text-white rounded-full font-bold text-lg">
                                        🥉
                                    </span>
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
            <p class="text-lg mb-4">Belum ada hasil perhitungan skor kantin</p>
        </div>
    @endif
</div>

<!-- Grafik Histogram -->
<div class="bg-white rounded-lg shadow-md p-6 mt-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">📈 Grafik Histogram Skor Akhir</h2>
    <canvas id="skorHistogram" height="100"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('skorHistogram').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($ranking as $rank)
                        '{{ $rank->alternatif->nama_alternatif }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Skor Akhir',
                    data: [
                        @foreach($ranking as $rank)
                            {{ number_format($rank->nilai_akhir, 4, '.', '') }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(34, 197, 94, 0.6)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nilai Akhir'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Kantin'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
</script>
@endpush
