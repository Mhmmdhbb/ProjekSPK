@extends('layouts.app')

@section('page-title', 'Tambah Penilaian')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Tambah Penilaian</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penilaian.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-6">
            <label for="alternatif_id" class="block text-sm font-semibold text-gray-900 mb-2">Pilih Kantin (Alternatif)</label>
            <select name="alternatif_id" id="alternatif_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                <option value="">-- Pilih Kantin --</option>
                @foreach ($alternatifs as $alternatif)
                    <option value="{{ $alternatif->id }}" {{ old('alternatif_id') == $alternatif->id ? 'selected' : '' }}>
                        {{ $alternatif->kode_alternatif }} - {{ $alternatif->nama_alternatif }}
                    </option>
                @endforeach
            </select>
        </div>

        <hr class="my-6">

        <h2 class="text-xl font-bold text-gray-900 mb-4">Penilaian Per Kriteria</h2>
        <p class="text-sm text-gray-500 mb-6">Pilih sub kriteria yang sesuai untuk setiap kriteria</p>

        @foreach ($kriterias as $kriteria)
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border">
                <label class="block text-sm font-semibold text-gray-900 mb-2">
                    {{ $kriteria->kode_kriteria }} - {{ $kriteria->nama_kriteria }}
                    <span class="text-xs text-gray-500 font-normal ml-2">(Bobot: {{ $kriteria->bobot }}% | {{ ucfirst($kriteria->tipe) }})</span>
                </label>
                
                @if($kriteria->subKriteria->count() > 0)
                    <select name="nilai[{{ $kriteria->id }}]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                        <option value="">-- Pilih Sub Kriteria --</option>
                        @foreach ($kriteria->subKriteria as $sub)
                            <option value="{{ $sub->nilai }}" {{ old('nilai.' . $kriteria->id) == $sub->nilai ? 'selected' : '' }}>
                                {{ $sub->nama_sub }} (Nilai: {{ $sub->nilai }})
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="number" name="nilai[{{ $kriteria->id }}]" value="{{ old('nilai.' . $kriteria->id) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                           min="1" max="5" required placeholder="Masukkan nilai (1-5)">
                    <p class="text-xs text-gray-400 mt-1">Belum ada sub kriteria, masukkan nilai manual (1-5)</p>
                @endif
            </div>
        @endforeach

        <div class="flex gap-4 mt-6">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan Penilaian
            </button>
            <a href="{{ route('penilaian.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
