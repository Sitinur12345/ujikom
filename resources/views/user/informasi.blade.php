@extends('layouts.user')

@section('title', 'Informasi - SMKN 4 BOGOR')

@section('styles')
<style>
        /* Information Specific Styles */
        
        .page-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
        }
        
        .page-subtitle {
            font-size: 1.1rem;
            color: #64748b;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
            padding: 0;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .info-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
        }
        
        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px -5px rgba(0, 0, 0, 0.15);
        }
        
        .info-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        
        .info-title {
            font-size: 1.65rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.3;
        }
        
        .info-description {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }
        
        .info-date {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #3b82f6;
            font-weight: 500;
            font-size: 1rem;
        }
        
        .info-date i {
            font-size: 1.1rem;
        }
        
        .achievement-section {
            background: white;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            margin-bottom: 40px;
        }
        
        .achievement-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 2.5rem;
            text-align: center;
        }
        
        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        @media (max-width: 1024px) {
            .achievement-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .achievement-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
        
        .achievement-item {
            text-align: center;
            padding: 2rem 1.5rem;
            background: #f8f9fa;
            border-radius: 16px;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .achievement-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
            border-color: #3b82f6;
        }
        
        .achievement-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 1.25rem;
        }
        
        .achievement-text {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.1rem;
            line-height: 1.5;
        }
        
        /* News list + Achievement list (compact) */
        .news-section { background: white; border: 1px solid #e5e7eb; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 40px; }
        .news-header { display:flex; align-items:center; gap:12px; padding:20px 28px; background: #0f172a; color:#fff; font-weight:700; font-size: 1.25rem; border-radius:20px 20px 0 0; }
        .news-list { padding: 0; margin: 0; list-style: none; }
        .news-item { display:flex; gap:16px; align-items:flex-start; padding:20px 28px; border-top: 1px solid #eef2f7; }
        .news-item:hover { background: #f8fafc; }
        .news-item .news-icon { color:#3b82f6; font-size: 1.25rem; }
        .news-item .news-title { font-weight:700; color:#1f2937; margin-bottom:8px; font-size: 1.1rem; }
        .news-item .news-meta { display:flex; gap:10px; align-items:center; color:#64748b; font-size: 0.95rem; margin-bottom:8px; }
        .news-item .news-text { color:#64748b; font-size: 1rem; line-height: 1.6; }
        
        .awards-section { background: white; border: 1px solid #e5e7eb; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 40px; }
        .awards-header { display:flex; align-items:center; gap:12px; padding:20px 28px; background: #0f172a; color:#fff; font-weight:700; font-size: 1.25rem; border-radius:20px 20px 0 0; }
        .awards-grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(380px,1fr)); gap:24px; padding:28px; }
        .award-card { background:#f8fafc; border:1px solid #e5e7eb; border-radius:16px; padding:20px 24px; display:flex; gap:16px; align-items:center; transition: all 0.3s ease; }
        .award-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .award-icon { width:56px; height:56px; border-radius:50%; background: linear-gradient(135deg,#3b82f6,#1e40af); color:#fff; display:flex; align-items:center; justify-content:center; font-size:1.5rem; flex-shrink: 0; }
        .award-title { font-weight:700; color:#1f2937; font-size: 1.1rem; margin-bottom: 4px; }
        .award-sub { color:#64748b; font-size: 0.95rem; }
        
        /* Staff dan Guru Section */
        .staff-section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 40px;
            overflow: hidden;
        }
        
        .staff-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }
        
        .staff-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .staff-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
        }
        
        .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 30px;
        }
        
        .staff-card {
            background: #f8f9fa;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .staff-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
        }
        
        .staff-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            background: white;
        }
        
        .staff-photo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
            overflow: hidden;
            position: relative;
        }
        
        .staff-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }
        
        .staff-photo:hover img {
            transform: scale(1.05);
        }
        
        .staff-photo-fallback {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .staff-info {
            flex: 1;
            min-width: 0;
        }
        
        .staff-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
            line-height: 1.3;
        }
        
        .staff-position {
            font-size: 0.9rem;
            color: #3b82f6;
            font-weight: 600;
            margin-bottom: 2px;
        }
        
        .staff-qualification {
            font-size: 0.85rem;
            color: #64748b;
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                min-height: auto;
                padding: 2rem 0;
            }
            
            .page-header {
                padding-top: 2rem;
                margin-bottom: 2rem;
            }
            
            .page-title {
                font-size: 1.5rem !important;
            }
            
            .page-subtitle {
                font-size: 1rem !important;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 0;
            }
            
            .info-card {
                padding: 1.5rem;
            }
            
            .info-icon {
                width: 60px;
                height: 60px;
                font-size: 1.75rem;
            }image.png
            
            .info-title {
                font-size: 1.25rem;
            }
            
            .info-description {
                font-size: 0.95rem;
            }
            
            .brand-text h1 {
                font-size: 22px;
            }
            
            .brand-text p {
                font-size: 14px;
            }
            
            .brand-icon {
                width: 60px;
                height: 70px;
            }
            
            .awards-grid {
                grid-template-columns: 1fr;
                padding: 20px;
            }
            
            
            .staff-grid {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 20px;
            }
            
            .staff-card {
                padding: 16px;
            }
            
            .staff-photo {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
            
            .staff-name {
                font-size: 1rem;
            }
            
            .staff-position {
                font-size: 0.85rem;
            }
            
            .staff-qualification {
                font-size: 0.8rem;
            }
            
            .staff-title {
                font-size: 1.25rem;
            }
            
            .staff-subtitle {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Informasi Terkini</h1>
                <p class="page-subtitle">Berita dan pengumuman terbaru dari SMKN 4 Bogor</p>
            </div>
            
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="info-title">Prestasi Juara 1 Lomba Kompetensi</h3>
                    <p class="info-description">Siswa SMKN 4 Bogor berhasil meraih juara 1 dalam Lomba Kompetensi Siswa tingkat provinsi Jawa Barat di bidang Teknologi Informasi.</p>
                    <div class="info-date">
                        <i class="fas fa-calendar"></i>
                        <span>15 Januari 2024</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="info-title">Penerimaan Siswa Baru 2025</h3>
                    <p class="info-description">Pendaftaran siswa baru untuk tahun ajaran 2025/2026 telah dibuka. Daftarkan diri Anda sekarang dan bergabunglah dengan keluarga besar SMKN 4 Bogor.</p>
                    <div class="info-date">
                        <i class="fas fa-calendar"></i>
                        <span>10 Januari 2025</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3 class="info-title">Update Sistem Galeri Terbaru</h3>
                    <p class="info-description">Website galeri sekolah telah diperbarui dengan fitur-fitur terbaru untuk memberikan pengalaman browsing yang lebih baik.</p>
                    <div class="info-date">
                        <i class="fas fa-calendar"></i>
                        <span>8 Januari 2025</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-folder-plus"></i>
                    </div>
                    <h3 class="info-title">Kategori Baru Ditambahkan</h3>
                    <p class="info-description">Kategori baru telah ditambahkan ke dalam sistem galeri untuk memudahkan pengorganisasian foto dan dokumentasi kegiatan sekolah.</p>
                    <div class="info-date">
                        <i class="fas fa-calendar"></i>
                        <span>5 Januari 2025</span>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="info-title">Workshop Guru dan Staf</h3>
                    <p class="info-description">Pelatihan peningkatan kompetensi guru dan staf dalam penggunaan teknologi digital untuk mendukung pembelajaran yang lebih efektif.</p>
                    <div class="info-date">
                        <i class="fas fa-calendar"></i>
                        <span>3 Januari 2025</span>
                    </div>
                </div>
                
            </div>


            <!-- Prestasi Sekolah (grid ringkas) -->
            <div class="awards-section">
                <div class="awards-header"><i class="fas fa-trophy"></i> Prestasi Sekolah</div>
                <div class="awards-grid">
                    <div class="award-card">
                        <div class="award-icon"><i class="fas fa-medal"></i></div>
                        <div>
                            <div class="award-title">Juara 1 Kompetisi Programming Nasional</div>
                            <div class="award-sub">2025 · Tim PPLG</div>
                        </div>
                    </div>
                    <div class="award-card">
                        <div class="award-icon"><i class="fas fa-medal"></i></div>
                        <div>
                            <div class="award-title">Juara 2 Lomba Jaringan Komputer</div>
                            <div class="award-sub">2025 · Tim TJKT</div>
                        </div>
                    </div>
                    <div class="award-card">
                        <div class="award-icon"><i class="fas fa-medal"></i></div>
                        <div>
                            <div class="award-title">Juara 3 Kompetisi Otomotif</div>
                            <div class="award-sub">2025 · Tim TO</div>
                        </div>
                    </div>
                    <div class="award-card">
                        <div class="award-icon"><i class="fas fa-medal"></i></div>
                        <div>
                            <div class="award-title">Juara 1 Lomba Pengelasan</div>
                            <div class="award-sub">2025 · Tim TPFL</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="achievement-section">
                <h2 class="achievement-title">Program Keahlian</h2>
                <div class="achievement-grid">
                    <div class="achievement-item">
                        <div class="achievement-icon"><i class="fas fa-code"></i></div>
                        <div class="achievement-text">PPLG<br><small>(Pengembangan Perangkat Lunak & Gim)</small></div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-icon"><i class="fas fa-network-wired"></i></div>
                        <div class="achievement-text">TJKT<br><small>(Teknik Jaringan Komputer & Telekomunikasi)</small></div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-icon"><i class="fas fa-industry"></i></div>
                        <div class="achievement-text">TPFL<br><small>(Teknik Pengelasan & Fabrikasi Logam)</small></div>
                    </div>
                    <div class="achievement-item">
                        <div class="achievement-icon"><i class="fas fa-car"></i></div>
                        <div class="achievement-text">TO<br><small>(Teknik Otomotif)</small></div>
                    </div>
                </div>
            </div>
            
            
        </div>
@endsection
