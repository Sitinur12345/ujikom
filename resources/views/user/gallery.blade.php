@extends('layouts.user')

@section('title', 'Galeri Foto - SMKN 4 BOGOR')

@section('styles')
<style>
        /* Gallery Specific Styles */
        
        .gallery-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .gallery-title { font-size: 2rem; font-weight: 700; color: #1e293b; margin-bottom: 15px; }
        
        .gallery-subtitle { font-size: 1.1rem; color: #64748b; max-width: 600px; margin: 0 auto; }
        
        /* Gallery Controls */
        .gallery-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .search-filter {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input { padding: 12px 16px 12px 45px; border: 1px solid #e5e7eb; border-radius: 12px; background: #fff; color: #1f2937; font-size: 16px; width: 300px; transition: all 0.3s ease; }
        
        .search-box input:focus { outline: none; border-color: #3b82f6; background: #fff; }
        
        .search-box input::placeholder { color: #94a3b8; }
        
        .search-box i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        
        .filter-select { padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 12px; background: #fff; color: #1f2937; font-size: 16px; cursor: pointer; }
        
        .filter-select:focus {
            outline: none;
            border-color: #3b82f6;
        }
        
        .view-toggle {
            display: flex;
            gap: 10px;
        }
        
        .view-btn { padding: 12px 16px; border: 1px solid #e5e7eb; background: #fff; color: #64748b; border-radius: 12px; cursor: pointer; transition: all 0.3s ease; }
        
        .view-btn.active { background: #3b82f6; border-color: #3b82f6; color: #fff; }
        
        .view-btn:hover { border-color: #3b82f6; }
        
        .add-photo-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .add-photo-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }
        
        /* Gallery Grid */
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 40px; margin-bottom: 40px; }
        
        /* Animation for filtered items */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .gallery-item { background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); border: 1px solid #e5e7eb; transition: all 0.3s ease; }
        
        .gallery-item:hover { transform: translateY(-8px); box-shadow: 0 20px 30px rgba(0,0,0,0.15); }
        
        .gallery-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            cursor: pointer;
        }
        
        .gallery-info {
            padding: 2rem;
        }
        
        .gallery-title { font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 12px; line-height: 1.3; }
        
        .gallery-category {
            display: inline-block;
            background: #3b82f6;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 14px;
        }
        
        .gallery-description { color: #64748b; font-size: 1rem; line-height: 1.7; margin-bottom: 18px; }
        
        .gallery-actions {
            display: flex;
            gap: 10px;
        }
        
        .action-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .edit-btn {
            background: #f59e0b;
            color: white;
        }
        
        .edit-btn:hover {
            background: #d97706;
        }
        
        .delete-btn {
            background: #ef4444;
            color: white;
        }
        
        .delete-btn:hover {
            background: #dc2626;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content { background: #fff; margin: 5% auto; padding: 0; border-radius: 16px; width: 90%; max-width: 600px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); animation: modalSlideIn 0.3s ease; }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-header { background: #f8f9fa; padding: 20px 30px; border-radius: 16px 16px 0 0; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb; }
        
        .modal-title { color: #1e293b; font-size: 24px; font-weight: 700; }
        
        .close { color: #64748b; font-size: 28px; font-weight: bold; cursor: pointer; transition: color 0.3s ease; }
        .close:hover { color: #111827; }
        
        .modal-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label { display: block; color: #374151; font-size: 14px; font-weight: 600; margin-bottom: 8px; }
        
        .form-input { width: 100%; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 10px; background: #fff; color: #111827; font-size: 16px; transition: all 0.3s ease; }
        
        .form-input:focus { outline: none; border-color: #3b82f6; background: #fff; box-shadow: 0 0 0 4px rgba(59,130,246,0.1); }
        
        .form-input::placeholder {
            color: #94a3b8;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .file-input {
            position: relative;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }
        
        .file-input input[type=file] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-input-label { display: block; padding: 12px 16px; border: 2px dashed #cbd5e1; border-radius: 10px; background: #fff; color: #64748b; text-align: center; transition: all 0.3s ease; cursor: pointer; }
        
        .file-input-label:hover { border-color: #3b82f6; background: #f8fafc; }
        
        .modal-footer { padding: 20px 30px; background: #f8f9fa; border-radius: 0 0 16px 16px; display: flex; justify-content: flex-end; gap: 15px; border-top: 1px solid #e5e7eb; }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-secondary {
            background: #64748b;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #475569;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-success {
            background: #10b981;
            color: white;
        }
        
        .btn-success:hover {
            background: #059669;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
            
            .gallery-controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-filter {
                justify-content: center;
            }
            
            .search-box input {
                width: 100%;
                max-width: 300px;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            
            .gallery-item {
                border-radius: 16px;
            }
            
            .gallery-info {
                padding: 1.5rem;
            }
            
            .gallery-title {
                font-size: 1.15rem;
            }
            
            .gallery-description {
                font-size: 0.95rem;
            }
            
            .modal-content {
                width: 95%;
                margin: 10% auto;
            }
        }
    </style>
@endsection

@section('content')
        <div class="container">
            <!-- Gallery Header -->
            <div class="gallery-header">
                <h1 class="gallery-title">Galeri Foto Kegiatan</h1>
                <p class="gallery-subtitle">Lihat dokumentasi kegiatan dan prestasi sekolah SMKN 4 BOGOR</p>
            </div>

            <!-- Gallery Controls -->
            <div class="gallery-controls">
                <div class="search-filter">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari foto...">
                    </div>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->judul }}">{{ $kategori->judul }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid" id="galleryGrid">
                @foreach($galeri as $item)
                <div class="gallery-item" data-category="{{ $item->post->kategori->judul ?? 'Umum' }}">
                    @if($item->fotos->count() > 0)
                        <img src="{{ asset('uploads/galeri/' . $item->fotos->first()->file) }}" 
                             alt="{{ $item->post->judul ?? 'Gallery Image' }}" 
                             class="gallery-image"
                             onclick="openImageModal('{{ asset('uploads/galeri/' . $item->fotos->first()->file) }}', '{{ $item->post->judul ?? 'Gallery Image' }}')">
                    @else
                        <div class="gallery-image" style="background: #f3f4f6; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                            <i class="fas fa-image" style="font-size: 48px;"></i>
                        </div>
                    @endif
                    <div class="gallery-info">
                        <h3 class="gallery-title">{{ $item->post->judul ?? 'Untitled' }}</h3>
                        <span class="gallery-category">{{ $item->post->kategori->judul ?? 'Umum' }}</span>
                        <p class="gallery-description">{{ $item->post->isi ?? 'No description available' }}</p>
                        @if($item->fotos->count() > 1)
                            <p class="gallery-description"><i class="fas fa-images"></i> {{ $item->fotos->count() }} foto</p>
                        @endif
                        <div class="d-flex align-items-center gap-2" style="margin-top:10px;">
                            @auth
                                @php
                                    $isLiked = $item->post && $item->post->likes->contains('id', auth()->id());
                                    $likesCount = $item->post ? $item->post->likes->count() : 0;
                                @endphp
                                <form action="{{ route('gallery.like', $item->post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $isLiked ? 'btn-danger' : 'btn-outline-danger' }}" 
                                            style="transition: all 0.3s ease;">
                                        <i class="{{ $isLiked ? 'fas' : 'far' }} fa-heart"></i> 
                                        {{ $isLiked ? 'Liked' : 'Like' }} ({{ $likesCount }})
                                    </button>
                                </form>
                                @if($item->fotos->first())
                                    <a href="{{ route('gallery.download', $item->fotos->first()->id) }}" 
                                       class="btn btn-sm btn-outline-success"
                                       onclick="return confirm('Apakah Anda yakin ingin mengunduh foto ini?')">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                @endif
                            @else
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('login') }}" title="Login untuk like dan download">
                                    <i class="fas fa-sign-in-alt"></i> Login untuk Like & Download
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h2 class="modal-title">Login untuk Download</h2>
                <span class="close" onclick="closeModal('loginModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}" onsubmit="return handleLogin(event)">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </div>
                    <input type="hidden" name="redirect_to" id="redirectTo">
                    <input type="hidden" name="download_url" id="downloadUrl">
                </form>
            </div>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content" style="max-width: 800px;">
            <div class="modal-header">
                <h2 class="modal-title" id="imageModalTitle">Preview Foto</h2>
                <span class="close" onclick="closeModal('imageModal')">&times;</span>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img id="imageModalImg" src="" alt="Preview" style="max-width: 100%; border-radius: 8px;">
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    // Variabel global untuk menyimpan URL download
    let downloadUrl = '';
    
    // Fungsi untuk menampilkan modal login
    function showLoginModal(url) {
        // Simpan URL download
        downloadUrl = url;
        // Tampilkan modal login
        document.getElementById('loginModal').style.display = 'block';
        // Set URL redirect setelah login
        document.getElementById('redirectTo').value = window.location.href;
    }
    
    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    // Fungsi untuk menangani submit form login
    function handleLogin(event) {
        // Set URL download ke form
        document.getElementById('downloadUrl').value = downloadUrl;
        
        // Lanjutkan submit form
        return true;
    }
    
    // Fungsi yang dipanggil setelah login berhasil
    @if(session('login_success'))
        // Jika login berhasil dan ada URL download yang disimpan
        if (downloadUrl) {
            window.location.href = downloadUrl;
            downloadUrl = ''; // Reset URL download
        }
    @endif
        function openImageModal(imageSrc, title) {
            document.getElementById('imageModalImg').src = imageSrc;
            document.getElementById('imageModalTitle').textContent = title;
            document.getElementById('imageModal').style.display = 'block';
        }

        function closeModal(modalId) { document.getElementById(modalId).style.display = 'none'; }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
        
        // Search and Filter
        document.getElementById('searchInput').addEventListener('input', function() {
            filterGallery();
        });
        
        document.getElementById('categoryFilter').addEventListener('change', function() {
            filterGallery();
        });
        
        function filterGallery() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value;
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            galleryItems.forEach(item => {
                const title = item.querySelector('.gallery-title').textContent.toLowerCase();
                const categorySpan = item.querySelector('.gallery-category');
                const category = categorySpan ? categorySpan.textContent.trim() : '';
                
                const matchesSearch = title.includes(searchTerm);
                const matchesCategory = !categoryFilter || category === categoryFilter;
                
                if (matchesSearch && matchesCategory) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.3s ease-in';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show count of filtered items
            const visibleItems = document.querySelectorAll('.gallery-item[style*="block"]').length;
            console.log(`Showing ${visibleItems} items for category: ${categoryFilter || 'All'}`);
        }
        
        // View Toggle
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const view = this.dataset.view;
                const grid = document.getElementById('galleryGrid');
                
                if (view === 'list') {
                    grid.style.gridTemplateColumns = '1fr';
                } else {
                    grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(300px, 1fr))';
                }
            });
        });
        
        // Halaman galeri kini read-only; tidak ada form CRUD
    </script>
@endsection

