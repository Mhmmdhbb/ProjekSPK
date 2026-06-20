@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Data Sub Kriteria</h1>
    <p class="text-gray-600 mt-2">Kelola sub kriteria dan nilai skalanya untuk setiap kriteria</p>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Daftar Sub Kriteria</h2>
        <a href="{{ route('sub-kriteria.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i> Tambah Sub Kriteria
        </a>
    </div>

    @if($subKriteria->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kriteria</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama Sub Kriteria</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Nilai</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subKriteria as $item)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-gray-900">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm font-semibold">
                                    {{ $item->kriteria->kode_kriteria }} - {{ $item->kriteria->nama_kriteria }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-900">{{ $item->nama_sub }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded text-sm font-semibold">
                                    {{ $item->nilai }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('sub-kriteria.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 mr-2 inline-block">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('sub-kriteria.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12 bg-gray-50 rounded-lg">
            <i class="fas fa-inbox text-5xl text-gray-400 mb-4 block"></i>
            <p class="text-gray-600 text-lg">Belum ada data sub kriteria</p>
            <a href="{{ route('sub-kriteria.create') }}" class="inline-block mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i> Tambah Sub Kriteria Pertama
            </a>
        </div>
    @endif
</div>

@endsection
