@extends('layouts.dashboard')

@section('title', 'Manajemen Halaman - Galeri Edu')

@section('content')
<div class="w-full">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Halaman</h1>
            <p class="text-gray-600 mt-1">Kelola halaman-halaman statis website</p>
        </div>
        <a href="{{ route('pages.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
            <i class="fas fa-plus mr-2"></i>Tambah Halaman
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Pages Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Halaman
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Slug
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Template
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Urutan
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Terakhir Diubah
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pages as $page)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $page->title }}</div>
                                @if($page->excerpt)
                                    <div class="text-sm text-gray-500">{{ Str::limit($page->excerpt, 80) }}</div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <code class="bg-gray-100 px-2 py-1 rounded">{{ $page->slug }}</code>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $page->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $page->status === 'published' ? 'Dipublikasi' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $page->template }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $page->sort_order }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $page->updated_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <!-- View Button -->
                                @if($page->status === 'published')
                                <a href="{{ route('page.show', $page->slug) }}" 
                                   target="_blank"
                                   class="text-blue-600 hover:text-blue-900" 
                                   title="Lihat Halaman">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endif
                                
                                <!-- Edit Button -->
                                <a href="{{ route('pages.edit', $page) }}" 
                                   class="text-indigo-600 hover:text-indigo-900" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Toggle Status Button -->
                                <button onclick="toggleStatus({{ $page->id }}, '{{ $page->status }}')" 
                                        class="text-amber-600 hover:text-amber-900" 
                                        title="Toggle Status">
                                    <i class="fas fa-toggle-{{ $page->status === 'published' ? 'on' : 'off' }}"></i>
                                </button>
                                
                                <!-- Delete Button -->
                                <button onclick="confirmDelete({{ $page->id }}, '{{ $page->title }}')" 
                                        class="text-red-600 hover:text-red-900" 
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-file-alt text-4xl mb-4"></i>
                                <h3 class="text-lg font-medium">Belum ada halaman</h3>
                                <p class="mt-2">Mulai dengan membuat halaman pertama</p>
                                <a href="{{ route('pages.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700">
                                    <i class="fas fa-plus mr-2"></i>Tambah Halaman
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Form (Hidden) -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@section('scripts')
<script>
// Toggle Status Function
async function toggleStatus(pageId, currentStatus) {
    try {
        const response = await fetch(`/pages/${pageId}/toggle-status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        if (response.ok) {
            const result = await response.json();
            // Reload page to reflect changes
            location.reload();
        } else {
            alert('Gagal mengubah status. Silakan coba lagi.');
        }
    } catch (error) {
        alert('Terjadi kesalahan. Silakan coba lagi.');
    }
}

// Confirm Delete Function
function confirmDelete(pageId, pageTitle) {
    if (confirm(`Apakah Anda yakin ingin menghapus halaman "${pageTitle}"?`)) {
        const form = document.getElementById('deleteForm');
        form.action = `/pages/${pageId}`;
        form.submit();
    }
}
</script>
@endsection
