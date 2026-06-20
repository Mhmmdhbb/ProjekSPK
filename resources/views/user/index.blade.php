@extends('layouts.app')

@section('page-title', 'Manajemen User')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Manajemen User</h1>
    <p class="text-gray-600 mt-2">Kelola pengguna sistem SPK Kantin Ramah Lingkungan</p>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="mb-6">
    <a href="{{ route('user.create') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
        <i class="fas fa-plus mr-2"></i> Tambah User Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if($users->count() > 0)
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Role</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                            <i class="fas fa-user text-blue-600 mr-2"></i>{{ $user->name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($user->role === 'admin')
                                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-bold">
                                    <i class="fas fa-shield-alt mr-1"></i>Admin
                                </span>
                            @else
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">
                                    <i class="fas fa-user-circle mr-1"></i>User
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            @if($user->id !== Auth::user()->id)
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center py-12 text-gray-500">
            <i class="fas fa-users text-5xl mb-3 block text-gray-300"></i>
            <p class="text-lg">Belum ada user terdaftar</p>
            <a href="{{ route('user.create') }}" class="inline-block mt-4 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i> Tambah User Pertama
            </a>
        </div>
    @endif
</div>
@endsection
