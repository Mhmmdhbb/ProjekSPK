@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Sub Kriteria</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sub-kriteria.update', $subKriteria->id) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="kriteria_id" class="block text-sm font-semibold text-gray-900 mb-2">Kriteria</label>
            <select name="kriteria_id" id="kriteria_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600" required>
                <option value="">Pilih Kriteria</option>
                @foreach ($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ $subKriteria->kriteria_id == $kriteria->id ? 'selected' : '' }}>
                        {{ $kriteria->kode_kriteria }} - {{ $kriteria->nama_kriteria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="nama_sub" class="block text-sm font-semibold text-gray-900 mb-2">Nama Sub Kriteria</label>
            <input type="text" name="nama_sub" id="nama_sub" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   value="{{ $subKriteria->nama_sub }}" required>
        </div>

        <div class="mb-6">
            <label for="nilai" class="block text-sm font-semibold text-gray-900 mb-2">Nilai (1-5)</label>
            <input type="number" name="nilai" id="nilai" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   value="{{ $subKriteria->nilai }}" min="1" max="5" required>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Perbarui
            </button>
            <a href="{{ route('sub-kriteria.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
