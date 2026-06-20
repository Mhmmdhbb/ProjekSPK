@extends('layouts.app')

@section('page-title', 'Riwayat Perhitungan')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Riwayat Penilaian Kantin</h1>
    <p class="text-gray-600 mt-2">Hasil penilaian kantin yang pernah Anda lakukan</p>
</div>

@if($riwayat->count() > 0)

<!-- Podium Terbaik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    @foreach($riwayat->take(3) as $index => $item)
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

<!-- Tabel Lengkap -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Lengkap Ranking</h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-green-500 to-green-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">Ranking</th>
                    <th class="px-6 py-4 text-left font-semibold">Kode</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama Kantin</th>
                    <th class="px-6 py-4 text-right font-semibold">Skor Akhir</th>
                    <th class="px-6 py-4 text-center font-semibold">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat as $item)
                    <tr class="border-b hover:bg-gray-50 transition @if($item->ranking <= 3) bg-gradient-to-r from-green-50 to-transparent @endif">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 text-white rounded-full font-bold text-lg">
                                {{ $item->ranking }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $item->alternatif->kode_alternatif }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            <i class="fas fa-store text-green-600 mr-2"></i>{{ $item->alternatif->nama_alternatif }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-lg text-green-600">{{ number_format($item->nilai_akhir, 4) }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->ranking == 1)
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">🥇 Terbaik</span>
                            @elseif($item->ranking == 2)
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold">🥈 Kedua</span>
                            @elseif($item->ranking == 3)
                                <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-sm font-semibold">🥉 Ketiga</span>
                            @else
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">📌 Peringkat {{ $item->ranking }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-sm text-gray-500">
        <i class="fas fa-clock mr-1"></i> Terakhir dihitung: {{ $riwayat->first()->updated_at->format('d M Y, H:i') }}
    </div>
</div>

<!-- Action Buttons -->
<div class="flex gap-4 mt-8">
    <a href="{{ route('perhitungan') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
        <i class="fas fa-calculator mr-2"></i> Evaluasi Ulang
    </a>
    <a href="{{ route('user.dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
    </a>
</div>

@else

<div class="bg-yellow-50 border-2 border-yellow-400 rounded-lg p-8 text-center">
    <i class="fas fa-exclamation-circle text-5xl text-yellow-600 mb-4 block"></i>
    <h2 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Riwayat</h2>
    <p class="text-gray-600 mb-6">Anda belum pernah melakukan penilaian. Silakan input data dan mulai evaluasi terlebih dahulu.</p>
    <a href="{{ route('penilaian.create') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 inline-block">
        <i class="fas fa-plus mr-2"></i> Input Penilaian
    </a>
</div>

@endif

@endsection
