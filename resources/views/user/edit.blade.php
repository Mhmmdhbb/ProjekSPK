@extends('layouts.app')

@section('page-title', 'Edit User')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-900">Edit User</h1>
    <p class="text-gray-600 mt-2">Perbarui informasi pengguna</p>
</div>

<div class="bg-white rounded-lg shadow-md p-8 max-w-md">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" 
                   value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror" 
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="role" class="block text-sm font-semibold text-gray-900 mb-2">Role</label>
            <select name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('role') border-red-500 @enderror" required>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('role')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="flex-1 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-semibold">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
            <a href="{{ route('user.index') }}" class="flex-1 bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 font-semibold text-center">
                <i class="fas fa-times mr-2"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
