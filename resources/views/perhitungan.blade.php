@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Evaluasi Kriteria Ramah Lingkungan</h1>
    <p class="text-gray-600 mt-2">Proses perhitungan nilai utilitas dan preferensi kantin ramah lingkungan</p>
</div>

@if(count($hasil) > 0)

<!-- Kantin Terbaik -->
<div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-8 text-white mb-8 text-center">
    <i class="fas fa-trophy text-5xl mb-4 block"></i>
    <h2 class="text-3xl font-bold">{{ $hasil[0]['nama'] }}</h2>
    <p class="text-green-100 mt-2">Kantin Terbaik Ramah Lingkungan</p>
    <h1 class="text-6xl font-bold mt-4">{{ number_format($hasil[0]['nilai_akhir'], 4) }}</h1>
</div>

<!-- Section 1: Matriks Keputusan -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-table mr-3 text-green-600"></i>Section 1: Matriks Keputusan Awal
    </h2>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-left font-semibold">Alternatif / Kantin</th>
                    @foreach($kriteria as $krit)
                        <th class="border border-gray-300 px-4 py-3 text-center font-semibold">
                            {{ $krit->kode_kriteria }}<br>
                            <span class="text-xs text-gray-600">{{ $krit->nama_kriteria }}</span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatif as $alt)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-semibold">
                            {{ $alt->kode_alternatif }}<br>
                            <span class="text-sm text-gray-600">{{ $alt->nama_alternatif }}</span>
                        </td>
                        @foreach($kriteria as $krit)
                            <td class="border border-gray-300 px-4 py-3 text-center font-semibold">
                                {{ $matriks[$alt->id][$krit->id] ?? 0 }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Section 2: Nilai Max & Min -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-arrows-alt-h mr-3 text-blue-600"></i>Section 2: Nilai Max dan Min Setiap Kriteria
    </h2>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-left font-semibold">Kriteria</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Min</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Max</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteria as $krit)
                    <?php
                        $kolom = [];
                        foreach ($alternatif as $alt) {
                            $kolom[] = $matriks[$alt->id][$krit->id] ?? 0;
                        }
                        $max = max($kolom);
                        $min = min($kolom);
                    ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-semibold">
                            {{ $krit->kode_kriteria }} - {{ $krit->nama_kriteria }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $min }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">{{ $max }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm font-semibold">
                                {{ ucfirst($krit->tipe) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Section 3: Kalkulasi Skor Akhir -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-calculator mr-3 text-purple-600"></i>Section 3: Kalkulasi Skor Akhir
    </h2>
    <div class="bg-gray-50 p-4 rounded mb-6 border-l-4 border-purple-600">
        <p class="text-sm text-gray-700"><strong>Rumus Benefit:</strong> Rij = (Xij - MinXj) / (MaxXj - MinXj)</p>
        <p class="text-sm text-gray-700 mt-2"><strong>Rumus Cost:</strong> Rij = (MaxXj - Xij) / (MaxXj - MinXj)</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-left font-semibold">Alternatif</th>
                    @foreach($kriteria as $krit)
                        <th class="border border-gray-300 px-4 py-3 text-center font-semibold">{{ $krit->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatif as $alt)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3 font-semibold">
                            {{ $alt->kode_alternatif }}<br>
                            <span class="text-sm text-gray-600">{{ $alt->nama_alternatif }}</span>
                        </td>
                        @foreach($kriteria as $krit)
                            <td class="border border-gray-300 px-4 py-3 text-center font-mono bg-blue-50">
                                {{ $normalisasi[$alt->id][$krit->id] ?? 0 }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Section 4: Perhitungan Preferensi -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-plus-circle mr-3 text-orange-600"></i>Section 4: Perhitungan Nilai Preferensi
    </h2>
    <div class="bg-gray-50 p-4 rounded mb-6 border-l-4 border-orange-600">
        <p class="text-sm text-gray-700"><strong>Rumus:</strong> V(i) = Σ(Wj × Rij)</p>
        <p class="text-sm text-gray-700 mt-2">Dimana: V(i) = Nilai Preferensi, W = Bobot Kriteria, R = Nilai Normalisasi</p>
    </div>
    
    <div class="space-y-6">
        @foreach($alternatif as $alt)
            <?php
                $calculations = [];
                $total = 0;
                foreach ($kriteria as $krit) {
                    $bobot = $krit->bobot / 100;
                    $normValue = $normalisasi[$alt->id][$krit->id] ?? 0;
                    $calc = $bobot * $normValue;
                    $calculations[] = [
                        'kode' => $krit->kode_kriteria,
                        'bobot' => $krit->bobot,
                        'norm' => $normValue,
                        'calc' => $calc
                    ];
                    $total += $calc;
                }
            ?>
            <div class="bg-gradient-to-r from-orange-50 to-yellow-50 p-4 rounded border border-orange-200">
                <h3 class="font-bold text-lg text-gray-900 mb-3">{{ $alt->kode_alternatif }} - {{ $alt->nama_alternatif }}</h3>
                <p class="text-sm text-gray-700 font-mono mb-3">
                    V({{ $alt->kode_alternatif }}) = 
                    @foreach($calculations as $index => $calc)
                        ({{ $calc['bobot'] }}% × {{ number_format($calc['norm'], 4) }})
                        @if($index < count($calculations) - 1) + @endif
                    @endforeach
                </p>
                <p class="text-sm text-gray-700 font-semibold">
                    = <span class="bg-orange-200 px-3 py-1 rounded">{{ number_format($total, 4) }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>

<!-- Section 5: Hasil Akhir & Ranking -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
        <i class="fas fa-trophy mr-3 text-yellow-600"></i>Section 5: Hasil Akhir & Ranking Kantin
    </h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">Ranking</th>
                    <th class="px-6 py-3 text-left font-semibold">Kode</th>
                    <th class="px-6 py-3 text-left font-semibold">Nama Kantin</th>
                    <th class="px-6 py-3 text-right font-semibold">Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasil as $index => $row)
                    <tr class="border-b hover:bg-gray-50 @if($index === 0) bg-yellow-50 @endif">
                        <td class="px-6 py-4">
                            @if($index === 0)
                                <span class="inline-flex items-center justify-center w-10 h-10 bg-yellow-400 text-white rounded-full font-bold text-lg">
                                    <i class="fas fa-medal"></i>
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-300 text-white rounded-full font-bold">
                                    {{ $index + 1 }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">
                            {{ $alternatif->find($row['alternatif_id'])->kode_alternatif }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            <i class="fas fa-store text-green-600 mr-2"></i>{{ $row['nama'] }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-lg text-orange-600">{{ number_format($row['nilai_akhir'], 4) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Action Buttons -->
<div class="flex gap-4 mb-8">
    <a href="{{ route('user.dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
    </a>
    <button onclick="window.print()" class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
        <i class="fas fa-print mr-2"></i> Cetak Laporan
    </button>
</div>

@else
<div class="bg-yellow-50 border-2 border-yellow-400 rounded-lg p-8 text-center">
    <i class="fas fa-exclamation-circle text-5xl text-yellow-600 mb-4 block"></i>
    <h2 class="text-2xl font-bold text-gray-900 mb-3">Data Tidak Lengkap</h2>
    <p class="text-gray-600 mb-6">Untuk melakukan evaluasi, pastikan:</p>
    <ul class="text-left bg-white rounded p-4 mb-6 inline-block">
        <li class="text-gray-700 mb-2">✓ Sudah ada {{ $kriteria->count() }} Kriteria</li>
        <li class="text-gray-700 mb-2">✓ Sudah ada {{ $alternatif->count() }} Kantin (Alternatif)</li>
        <li class="text-gray-700">✓ Sudah ada data Penilaian untuk setiap Kantin & Kriteria</li>
    </ul>
    <a href="{{ route('user.dashboard') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 inline-block">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
    </a>
</div>
@endif

@endsection