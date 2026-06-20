@extends('layouts.app')

@section('page-title', 'Ranking')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Ranking Kantin Ramah Lingkungan</h1>
    <p class="text-gray-600 mt-2">Hasil perangkingan kantin berdasarkan penilaian Anda</p>
</div>

@php
    $hasil = \App\Models\HasilMaut::with('alternatif')
        ->where('user_id', Auth::id())
        ->orderBy('ranking', 'asc')
        ->get();
@endphp

@if($hasil->count() > 0)

<!-- Podium Terbaik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    @foreach($hasil->take(3) as $index => $item)
        @php
            $positions = [
                0 => ['rank' => '🥇 JUARA 1', 'bg' => 'from-yellow-400 to-yellow-500', 'text' => 'text-yellow-900'],
                1 => ['rank' => '🥈 JUARA 2', 'bg' => 'from-gray-400 to-gray-500', 'text' => 'text-gray-900'],
                2 => ['rank' => '🥉 JUARA 3', 'bg' => 'from-orange-400 to-orange-500', 'text' => 'text-orange-900']
            ];
            $pos = $positions[$index];
        @endphp
        <div class="bg-gradient-to-br {{ $pos['bg'] }} rounded-lg shadow-lg p-6 text-center transform hover:scale-105 transition">
            <h3 class="text-xl font-bold {{ $pos['text'] }} mb-2">{{ $pos['rank'] }}</h3>
            <p class="text-lg font-semibold {{ $pos['text'] }} mb-3">{{ $item->alternatif->nama_alternatif }}</p>
            <div class="bg-white bg-opacity-30 rounded p-3">
                <p class="text-sm {{ $pos['text'] }}">Skor Akhir</p>
                <p class="text-3xl font-bold {{ $pos['text'] }}">{{ number_format($item->nilai_akhir, 4) }}</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Grafik Histogram Ranking -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">📈 Grafik Histogram Skor Akhir</h2>
    <canvas id="rankingHistogram" height="100"></canvas>
</div>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8">
    <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md p-6 text-white">
        <h3 class="text-sm font-semibold mb-2">Total Kantin</h3>
        <p class="text-3xl font-bold">{{ $hasil->count() }}</p>
    </div>
    <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-md p-6 text-white">
        <h3 class="text-sm font-semibold mb-2">Nilai Tertinggi</h3>
        <p class="text-3xl font-bold">{{ number_format($hasil->max('nilai_akhir'), 4) }}</p>
    </div>
    <div class="bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md p-6 text-white">
        <h3 class="text-sm font-semibold mb-2">Nilai Terendah</h3>
        <p class="text-3xl font-bold">{{ number_format($hasil->min('nilai_akhir'), 4) }}</p>
    </div>
    <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg shadow-md p-6 text-white">
        <h3 class="text-sm font-semibold mb-2">Rata-rata Nilai</h3>
        <p class="text-3xl font-bold">{{ number_format($hasil->avg('nilai_akhir'), 4) }}</p>
    </div>
</div>

<!-- Action Buttons -->
<div class="flex gap-4 mt-8">
    <a href="{{ route('perhitungan') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
        <i class="fas fa-calculator mr-2"></i> Lihat Hasil Penilaian
    </a>
    <a href="{{ route('user.dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
    </a>
</div>

@else

<div class="bg-yellow-50 border-2 border-yellow-400 rounded-lg p-8 text-center">
    <i class="fas fa-exclamation-circle text-5xl text-yellow-600 mb-4 block"></i>
    <h2 class="text-2xl font-bold text-gray-900 mb-3">Data Ranking Belum Tersedia</h2>
    <p class="text-gray-600 mb-6">Lakukan penilaian kantin terlebih dahulu untuk melihat ranking</p>
    <a href="{{ route('perhitungan') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 inline-block">
        <i class="fas fa-calculator mr-2"></i> Mulai Evaluasi Kantin
    </a>
</div>

@endif

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('rankingHistogram').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($hasil as $item)
                        '{{ $item->alternatif->nama_alternatif }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Skor Akhir',
                    data: [
                        @foreach($hasil as $item)
                            {{ number_format($item->nilai_akhir, 4, '.', '') }},
                        @endforeach
                    ],
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
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
                            text: 'Skor Akhir'
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
