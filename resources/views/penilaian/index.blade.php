@extends('layouts.app')

@section('page-title', 'Data Penilaian')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Data Penilaian Saya</h1>
    <a href="{{ route('penilaian.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
        <i class="fas fa-plus mr-2"></i> Tambah Penilaian
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ $message }}
    </div>
@endif

@php
    // Kelompokkan penilaian per alternatif
    $grouped = $penilaians->groupBy('alternatif_id');
@endphp

@if($grouped->count() > 0)
<div class="space-y-6">
    @foreach($grouped as $alternatifId => $items)
        @php $alt = $items->first()->alternatif; @endphp
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 flex justify-between items-center">
                <div class="text-white">
                    <h3 class="font-bold text-lg"><i class="fas fa-store mr-2"></i>{{ $alt->kode_alternatif }} - {{ $alt->nama_alternatif }}</h3>
                    <p class="text-sm text-green-100">{{ $items->count() }} kriteria dinilai</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('penilaian.edit', $alternatifId) }}" class="bg-white text-green-600 px-3 py-1.5 rounded text-sm font-semibold hover:bg-green-50">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('penilaian.destroy', $alternatifId) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded text-sm font-semibold hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus semua penilaian untuk kantin ini?')">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kriteria</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $penilaian)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3 text-sm text-gray-900">
                                {{ $penilaian->kriteria->kode_kriteria }} - {{ $penilaian->kriteria->nama_kriteria }}
                            </td>
                            <td class="px-6 py-3 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-green-100 text-green-700 rounded-full font-bold">{{ $penilaian->nilai }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@else
<div class="bg-white rounded-lg shadow-md p-8 text-center">
    <i class="fas fa-clipboard text-5xl text-gray-300 mb-4 block"></i>
    <p class="text-lg text-gray-500 mb-4">Anda belum memberikan penilaian apapun</p>
    <a href="{{ route('penilaian.create') }}" class="inline-block px-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700">
        <i class="fas fa-plus mr-2"></i> Mulai Penilaian
    </a>
</div>
@endif
@endsection
