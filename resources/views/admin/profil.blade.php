@extends('layouts.app')

@section('page-title', 'Profil Akun Admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Profil Akun</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')

        <!-- Info Role -->
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-500">Role</p>
            <p class="font-bold text-lg text-gray-900">
                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Admin</span>
            </p>
        </div>

        <div class="mb-6">
            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   required>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                   required>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-semibold text-gray-900 mb-2">Password Baru <span class="text-gray-400 font-normal">(kosongkan jika tidak ingin ganti)</span></label>
            <input type="password" name="password" id="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-2">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600">
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
