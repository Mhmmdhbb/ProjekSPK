@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Tambah Kantin (Alternatif) Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alternatif.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-6">
            <label for="kode_alternatif" class="block text-sm font-semibold text-gray-900 mb-2">Kode Kantin</label>
            <input type="text" name="kode_alternatif" id="kode_alternatif" placeholder="Contoh: KU1, KU2, KU3" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   value="{{ old('kode_alternatif') }}" required>
            <p class="text-xs text-gray-500 mt-2">Gunakan kode singkat dan unik untuk identifikasi kantin</p>
        </div>

        <div class="mb-6">
            <label for="nama_alternatif" class="block text-sm font-semibold text-gray-900 mb-2">Nama Kantin</label>
            <input type="text" name="nama_alternatif" id="nama_alternatif" placeholder="Contoh: Kantin Universitas Janabadra Pingit" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   value="{{ old('nama_alternatif') }}" required>
            <p class="text-xs text-gray-500 mt-2">Masukkan nama lengkap kantin yang akan dinilai</p>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="{{ route('alternatif.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection