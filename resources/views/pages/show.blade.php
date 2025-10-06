@extends('layouts.guest')

@section('title', $page->meta_data['meta_title'] ?? $page->title . ' - Galeri Edu')

@push('meta')
@if(isset($page->meta_data['meta_description']))
<meta name="description" content="{{ $page->meta_data['meta_description'] }}">
@elseif($page->excerpt)
<meta name="description" content="{{ $page->excerpt }}">
@endif

@if(isset($page->meta_data['meta_keywords']))
<meta name="keywords" content="{{ $page->meta_data['meta_keywords'] }}">
@endif
@endpush

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-teal-600 hover:text-teal-700">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
                    </a>
                </div>
                <div class="text-sm text-gray-500">
                    {{ $page->updated_at->format('d F Y') }}
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($page->template === 'full-width')
            <!-- Full Width Template -->
            <div class="w-full">
                <article class="prose prose-lg max-w-none">
                    <header class="mb-8">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $page->title }}</h1>
                        @if($page->excerpt)
                            <p class="text-xl text-gray-600 leading-relaxed">{{ $page->excerpt }}</p>
                        @endif
                    </header>
                    
                    <div class="content">
                        {!! $page->content !!}
                    </div>
                </article>
            </div>
        @elseif($page->template === 'sidebar')
            <!-- With Sidebar Template -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <article class="prose prose-lg">
                        <header class="mb-8">
                            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $page->title }}</h1>
                            @if($page->excerpt)
                                <p class="text-xl text-gray-600 leading-relaxed">{{ $page->excerpt }}</p>
                            @endif
                        </header>
                        
                        <div class="content">
                            {!! $page->content !!}
                        </div>
                    </article>
                </div>
                
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <aside class="bg-white rounded-lg shadow-sm p-6 sticky top-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Halaman Lainnya</h3>
                        <ul class="space-y-3">
                            @foreach(App\Models\Page::published()->where('id', '!=', $page->id)->ordered()->limit(5)->get() as $otherPage)
                                <li>
                                    <a href="{{ route('page.show', $otherPage->slug) }}" 
                                       class="block text-teal-600 hover:text-teal-700 hover:underline">
                                        {{ $otherPage->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        
                        <div class="mt-8 p-4 bg-teal-50 rounded-lg">
                            <h4 class="font-medium text-teal-900 mb-2">Butuh Bantuan?</h4>
                            <p class="text-sm text-teal-700">
                                Hubungi kami untuk informasi lebih lanjut tentang {{ $page->title }}.
                            </p>
                            <a href="{{ route('page.show', 'kontak') }}" 
                               class="inline-flex items-center mt-2 text-sm font-medium text-teal-600 hover:text-teal-700">
                                Kontak Kami <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        @else
            <!-- Default Template -->
            <div class="max-w-3xl mx-auto">
                <article class="prose prose-lg mx-auto">
                    <header class="mb-8 text-center">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $page->title }}</h1>
                        @if($page->excerpt)
                            <p class="text-xl text-gray-600 leading-relaxed">{{ $page->excerpt }}</p>
                        @endif
                        <div class="mt-4 text-sm text-gray-500">
                            Terakhir diperbarui: {{ $page->updated_at->format('d F Y') }}
                        </div>
                    </header>
                    
                    <div class="content">
                        {!! $page->content !!}
                    </div>
                </article>
            </div>
        @endif
    </main>

    <!-- Footer Navigation -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 border-t">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500">Bagikan:</span>
                <div class="flex space-x-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" 
                       class="text-blue-600 hover:text-blue-700">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($page->title) }}" 
                       target="_blank" 
                       class="text-blue-400 hover:text-blue-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($page->title . ' - ' . request()->fullUrl()) }}" 
                       target="_blank" 
                       class="text-green-600 hover:text-green-700">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <div class="text-sm text-gray-500">
                <a href="{{ url('/') }}" class="text-teal-600 hover:text-teal-700">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
</div>

@endsection

@push('styles')
<style>
/* Custom prose styles untuk konten */
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: #1f2937;
    font-weight: 600;
}

.prose h1 { font-size: 2.25rem; }
.prose h2 { font-size: 1.875rem; margin-top: 2rem; }
.prose h3 { font-size: 1.5rem; margin-top: 1.5rem; }

.prose p {
    margin-bottom: 1rem;
    line-height: 1.75;
}

.prose ul, .prose ol {
    margin: 1rem 0;
    padding-left: 1.5rem;
}

.prose li {
    margin-bottom: 0.5rem;
}

.prose a {
    color: #0d9488;
    text-decoration: underline;
}

.prose a:hover {
    color: #0f766e;
}

.prose blockquote {
    border-left: 4px solid #0d9488;
    padding-left: 1rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: #4b5563;
}

.prose img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1.5rem 0;
}

.prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}

.prose th, .prose td {
    border: 1px solid #e5e7eb;
    padding: 0.75rem;
    text-align: left;
}

.prose th {
    background-color: #f9fafb;
    font-weight: 600;
}
</style>
@endpush
