@extends('layouts.dashboard')

@section('title', 'Edit Petugas - Galeri Edu')

@section('content')
<div class="w-full">
    <div class="bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">Edit Petugas</h2>
                <a href="{{ route('petugas.index') }}" class="text-slate-600 hover:text-slate-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="p-6">
            <form method="POST" action="{{ route('petugas.update', $petugas) }}" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        Username <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('username') border-red-500 @enderror"
                        placeholder="Masukkan username"
                        value="{{ old('username', $petugas->username) }}"
                    >
                    @error('username')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('email') border-red-500 @enderror"
                        placeholder="Masukkan email"
                        value="{{ old('email', $petugas->email) }}"
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password <span class="text-gray-500">(kosongkan jika tidak ingin mengubah)</span>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('password') border-red-500 @enderror"
                        placeholder="Masukkan password baru (min. 6 karakter)"
                    >
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('petugas.index') }}" class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-save mr-2"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
