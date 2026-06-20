@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Data Kantin (Alternatif)</h1>
    <p class="text-gray-600 mt-2">Kelola daftar kantin yang akan dinilai</p>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Daftar Kantin</h2>
        <a href="{{ route('alternatif.create') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i> Tambah Kantin
        </a>
    </div>

    @if($alternatif->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b-2 border-gray-300">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kode Kantin</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama Kantin</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $item)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded text-sm">{{ $item->kode_alternatif }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                <i class="fas fa-store text-green-600 mr-2"></i>{{ $item->nama_alternatif }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('alternatif.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 mr-2 inline-block">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
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
            <p class="text-gray-600 text-lg">Belum ada data kantin</p>
            <a href="{{ route('alternatif.create') }}" class="inline-block mt-4 bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i> Tambah Kantin Pertama
            </a>
        </div>
    @endif
</div>

@endsection