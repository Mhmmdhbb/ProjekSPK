@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Tambah Kriteria</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kriteria.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-6">
            <label for="kode_kriteria" class="block text-sm font-semibold text-gray-900 mb-2">Kode Kriteria</label>
            <input type="text" name="kode_kriteria" id="kode_kriteria" value="{{ old('kode_kriteria') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   placeholder="Contoh: C1" required>
        </div>

        <div class="mb-6">
            <label for="nama_kriteria" class="block text-sm font-semibold text-gray-900 mb-2">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" value="{{ old('nama_kriteria') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   placeholder="Contoh: Pemilahan Sampah" required>
        </div>

        <div class="mb-6">
            <label for="bobot" class="block text-sm font-semibold text-gray-900 mb-2">Bobot (%)</label>
            <input type="number" name="bobot" id="bobot" value="{{ old('bobot') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   placeholder="Contoh: 15" step="0.01" required>
        </div>

        <div class="mb-6">
            <label for="tipe" class="block text-sm font-semibold text-gray-900 mb-2">Tipe</label>
            <select name="tipe" id="tipe" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                <option value="">Pilih Tipe</option>
                <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>Benefit (Semakin Tinggi Semakin Baik)</option>
                <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost (Semakin Rendah Semakin Baik)</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="{{ route('kriteria.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
