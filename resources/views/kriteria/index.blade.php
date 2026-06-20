@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Data Kriteria</h1>
        <a href="{{ route('kriteria.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i> Tambah Kriteria
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ $message }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kode</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama Kriteria</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Bobot (%)</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Tipe</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kriterias as $kriteria)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $kriteria->kode_kriteria }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $kriteria->nama_kriteria }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $kriteria->bobot }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded">{{ ucfirst($kriteria->tipe) }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-center">
                            <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data kriteria</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
