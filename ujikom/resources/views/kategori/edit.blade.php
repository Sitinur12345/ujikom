@extends('layouts.dashboard')

@section('title', 'Edit Kategori - Galeri Edu')

@section('content')
<div class="w-full">
    <div class="bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">Edit Kategori</h2>
                <a href="{{ route('kategori.index') }}" class="text-slate-600 hover:text-slate-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="p-6">
            <form method="POST" action="{{ route('kategori.update', $kategori->id) }}" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="judul" 
                        id="judul" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-600 focus:border-teal-600 @error('judul') border-red-500 @enderror"
                        placeholder="Masukkan nama kategori"
                        value="{{ old('judul', $kategori->judul) }}"
                    >
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('kategori.index') }}" class="bg-slate-500 hover:bg-slate-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
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
