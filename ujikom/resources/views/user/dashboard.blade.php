<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 BOGOR - Galeri Edu</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
            scroll-behavior: smooth;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 40px;
        }
        
        @media (min-width: 1400px) {
            .container {
                padding: 0 60px;
            }
        }
        
        /* Header Section - Modern Navbar Style */
        .header {
            background: white;
            padding: 20px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
        }
        
        .branding {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .brand-icon {
            width: 60px;
            height: 60px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .brand-icon svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 2px 4px rgba(30, 58, 138, 0.2));
        }
        
        .brand-text h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            line-height: 1.2;
        }
        
        .brand-text p {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
            margin: 0;
            line-height: 1;
        }
        
        /* Navigation Menu */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .nav-links li a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .nav-links li a:hover {
            color: #3b82f6;
            background: #f1f5f9;
        }
        
        .nav-links li a.active {
            color: white;
            background: #3b82f6;
        }
        
        .login-btn {
            background: #3b82f6;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        
        .login-btn:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #64748b;
            cursor: pointer;
        }
        
        /* Hero Section - Enhanced Design */
        .hero {
            background: linear-gradient(rgba(30, 58, 138, 0.85), rgba(59, 130, 246, 0.75)), 
                        url('{{ asset("images/DJI_0148.JPG") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            padding: 120px 0;
            text-align: center;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        /* Fallback background if custom image not found */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            z-index: -1;
        }
        
        .hero-text-box {
            position: relative;
            z-index: 2;
        }
        
        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            color: white;
        }
        
        .hero-icon {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 40px;
            font-size: 4rem;
            color: white;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            color: white;
            margin-bottom: 25px;
            line-height: 1.2;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            letter-spacing: -1px;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 45px;
            font-weight: 400;
            font-style: italic;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .hero-btn {
            background: white;
            color: #3b82f6;
            padding: 18px 45px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            background: #f8f9fa;
        }
        
        .hero-btn i {
            font-size: 1.2rem;
        }
        
        /* Main Content */
        .main-content {
            padding: 0;
            background: #f8f9fa;
        }
        
        /* Profil Section - Full Screen */
        #profil {
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 0;
        }
        
        #profil > .row {
            width: 100%;
            margin: 0;
        }
        
        #profil .container {
            padding: 0 40px;
        }
        
        /* Contact & Map Section - Admin Style */
        .contact-map {
            margin: 0;
            padding: 80px 40px;
            background: #f8f9fa;
            width: 100%;
        }
        
        .contact-map .container {
            max-width: 100%;
            padding: 0;
        }
        
        .contact-map-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        
        .contact-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }
        
        .contact-card h4 {
            color: #1e293b;
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .contact-card p {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.7;
        }
        
        .contact-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }
        
        .contact-row {
            display: flex;
            gap: 30px;
        }
        
        .contact-card.small {
            flex: 1;
            padding: 2rem 1.5rem;
        }
        
        .map-container {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .map-container:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }
        
        .map-frame {
            width: 100%;
            height: 450px;
            position: relative;
            overflow: hidden;
        }
        
        .map-frame iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        
        .map-frame iframe:hover {
            transform: scale(1.02);
        }
        
        .map-frame::before {
            content: "Gunakan Ctrl + Scroll untuk zoom";
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 12px;
            z-index: 10;
            pointer-events: none;
            opacity: 0.8;
        }
        
        .map-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px 0;
        }
        
        .btn-map {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
            text-decoration: none;
        }
        
        .btn-map:hover {
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(59, 130, 246, 0.4);
        }
        
        /* Footer - Admin Style */
        .footer {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            text-align: center;
            padding: 40px 0;
            box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .footer-left {
            text-align: left;
        }
        
        .footer-right {
            text-align: right;
        }
        
        .footer-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .footer-text {
            font-size: 14px;
            opacity: 0.8;
        }
        
        /* Footer Hover Effects */
        footer a:hover {
            color: #3b82f6 !important;
        }
        
        footer .d-flex a:hover {
            background: rgba(59, 130, 246, 0.4) !important;
            transform: translateY(-2px);
        }
        
        /* Responsive Design - Enhanced */
        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }
            
            .contact-map {
                padding: 40px 20px;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .contact-card.small {
                padding: 16px;
            }
            
            .map-frame {
                height: 300px;
            }
            
            .map-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            footer .row {
                margin: 0;
            }
            
            footer [class*="col-"] {
                padding: 0 15px;
            }
            
            footer .col-lg-3,
            footer .col-lg-2,
            footer .col-lg-4 {
                text-align: center;
            }
            
            footer .d-flex {
                justify-content: center;
            }
            
            .hero {
                padding: 80px 0;
                min-height: 80vh;
            }
            
            .hero-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
                margin-bottom: 30px;
            }
            
            .hero-title {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                margin-bottom: 35px;
            }
            
            .hero-btn {
                padding: 15px 35px;
                font-size: 1rem;
            }
            
            .hero-text-box {
                max-width: 90%;
                padding: 25px;
                background: rgba(255, 255, 255, 0.8);
            }
            
            .hero-subtitle {
                font-size: 13px;
            }
            
            .hero {
                background-attachment: scroll;
                min-height: 80vh;
                padding: 60px 0;
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
            
            
            .contact-card {
                padding: 24px 16px;
            }
            
            /* Profil Section Mobile */
            #profil {
                min-height: auto;
                padding: 2rem 0;
            }
            
            #profil .display-3 {
                font-size: 2rem !important;
            }
            
            #profil .fs-4 {
                font-size: 1rem !important;
            }
            
            #profil .card-body {
                padding: 1.5rem !important;
            }
            
            #profil h3 {
                font-size: 1.75rem !important;
            }
            
            #profil .btn-lg {
                padding: 12px 24px !important;
                font-size: 0.95rem !important;
            }
            
            /* Mobile Navigation */
            .mobile-menu-toggle {
                display: block;
            }
            
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                gap: 10px;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li a {
                padding: 12px 16px;
                width: 100%;
                text-align: center;
            }
        }
        
        /* Additional Medicio-style enhancements */
        .medicio-card {
            position: relative;
            overflow: hidden;
        }
        
        .medicio-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(30, 64, 175, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .medicio-card:hover::after {
            opacity: 1;
        }
        
        .medicio-icon {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="navbar">
                <div class="branding">
                    <div class="brand-icon">
                        <img src="{{ asset('images/LOGO_SMKN_4.png') }}" alt="SMKN 4 Bogor Logo" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <div class="brand-text">
                        <h1>SMKN 4</h1>
                        <p>Bogor</p>
                    </div>
                </div>
                
                <div class="nav-menu">
                    <ul class="nav-links">
                        <li><a href="{{ route('user.dashboard') }}" class="nav-link active">Beranda</a></li>
                        <li><a href="{{ route('user.agenda') }}" class="nav-link">Agenda</a></li>
                        <li><a href="{{ route('user.informasi') }}" class="nav-link">Informasi</a></li>
                        <li><a href="{{ route('user.gallery') }}" class="nav-link">Galeri</a></li>
                    </ul>
                </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text-box">
                    <div class="hero-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h2 class="hero-title">Selamat Datang di SMKN 4 BOGOR</h2>
                    <p class="hero-subtitle">"Maju seiring perkembangan digital"</p>
                    <a href="#main-content" class="hero-btn">
                        <i class="fas fa-arrow-down mr-2"></i>Lihat Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="container">
            <!-- Profil Section -->
            <section id="profil">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-10">
                        <div class="text-center mb-5">
                            <h2 class="display-3 fw-bold text-primary mb-4" style="font-size: 3.5rem;">Profil SMKN 4 BOGOR</h2>
                            <p class="lead text-muted fs-4">Maju seiring perkembangan digital</p>
                        </div>
                        <div class="card border-0 shadow-lg mb-5" style="border-radius: 24px;">
                            <div class="card-body p-5" style="padding: 3rem 4rem !important;">
                                <div class="row align-items-center">
                                    <div class="col-md-4 text-center mb-4 mb-md-0">
                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
                                            <i class="fas fa-graduation-cap text-white" style="font-size: 6rem;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="card-title text-primary mb-4 fw-bold" style="font-size: 2.5rem;">SMK Negeri 4 Bogor</h3>
                                        <p class="card-text text-muted lh-lg" style="font-size: 1.25rem;">SMK Negeri 4 Bogor dikenal juga dengan sebutan NEBRAZKA (mirip Nebraska negara bagian Amerika) singkatan dari Negeri Empat Bogor AZKA. Azka sendiri memiliki arti suci, berbudi luhur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Visi & Misi -->
                        <div class="row g-4 mb-4">
                            <!-- Visi -->
                            <div class="col-lg-6">
                                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                                    <div class="card-body p-4" style="padding: 2rem !important;">
                                        <h4 class="card-title text-primary mb-4 fw-bold" style="font-size: 1.75rem;">
                                            <i class="fas fa-eye me-2"></i>Visi
                                        </h4>
                                        <p class="text-muted mb-0 lh-lg" style="font-size: 1.1rem;">"Terwujudnya sekolah vokasi unggul yang melahirkan lulusan berkarakter, kompeten, dan berdaya saing di era digital dan mencetak pelajar Pancasila yang berbasis teknologi, berwawasan lingkungan, dan berwirausaha"</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Misi -->
                            <div class="col-lg-6">
                                <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                                    <div class="card-body p-4" style="padding: 2rem !important;">
                                        <h4 class="card-title text-primary mb-4 fw-bold" style="font-size: 1.75rem;">
                                            <i class="fas fa-bullseye me-2"></i>Misi
                                        </h4>
                                        <ul class="text-muted mb-0 lh-lg" style="padding-left: 18px; font-size: 1.1rem;">
                                            <li class="mb-3">Menciptakan pelajar Pancasila yang berteknologi, berwawasan lingkungan, dan berwirausaha.</li>
                                            <li>Mengoptimalkan potensi sekolah untuk mencapai keunggulan dengan fokus pada teknologi dan wawasan lingkungan serta kewirausahaan.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Akses Cepat -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                                    <div class="card-body text-center" style="padding: 2.5rem 2rem;">
                                        <h5 class="text-primary fw-bold mb-4" style="font-size: 1.75rem; letter-spacing: 0.5px;">
                                            <i class="fas fa-rocket me-2"></i>Akses Cepat
                                        </h5>
                                        <div class="d-flex flex-wrap justify-content-center gap-4">
                                            <a href="#profil" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 16px 32px; min-width: 160px; font-size: 1.1rem; border-width: 2px;">
                                                <i class="fas fa-user me-2"></i>Profil
                                            </a>
                                            <a href="{{ route('user.agenda') }}" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 16px 32px; min-width: 160px; font-size: 1.1rem; border-width: 2px;">
                                                <i class="fas fa-calendar-alt me-2"></i>Agenda
                                            </a>
                                            <a href="{{ route('user.informasi') }}" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 16px 32px; min-width: 160px; font-size: 1.1rem; border-width: 2px;">
                                                <i class="fas fa-bullhorn me-2"></i>Informasi
                                            </a>
                                            <a href="{{ route('user.gallery') }}" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 16px 32px; min-width: 160px; font-size: 1.1rem; border-width: 2px;">
                                                <i class="fas fa-images me-2"></i>Galeri
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    
                    
    <!-- Contact & Map Section -->
    <section class="contact-map">
        <h3 class="section-title" style="color: #1e293b; text-align: center; font-size: 2.25rem; margin-bottom: 50px; font-weight: 700;">Hubungi Kami</h3>
        <div class="contact-map-grid">
                <!-- Contact Information -->
                <div class="contact-info">
                    <div class="contact-card medicio-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Alamat</h4>
                        <p>
                            <a href="https://maps.app.goo.gl/mWEEtkELMD4XYdxE6" target="_blank" style="color:#64748b; text-decoration:none;">
                                Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137
                            </a>
                        </p>
                    </div>
                    
                    <div class="contact-row">
                        <div class="contact-card small medicio-card">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Telepon</h4>
                            <p> (0251) 7547381</p>
                        </div>
                        
                        <div class="contact-card small medicio-card">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email</h4>
                            <p>admin@smkn4bogor.sch.id</p>
                        </div>
                    </div>
                </div>
                
                <!-- Google Maps -->
                <div class="map-container medicio-card">
                    <div class="map-frame" style="position: relative; cursor: pointer;" onclick="window.open('https://maps.app.goo.gl/mWEEtkELMD4XYdxE6', '_blank')">
                        <iframe 
                            src="https://www.google.com/maps?q=Jl.+Raya+Tajur,+Kp.+Buntar+RT.02%2FRW.08,+Kel.+Muara+sari,+Kec.+Bogor+Selatan,+RT.03%2FRW.08,+Muarasari,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16137&output=embed"
                            width="100%" 
                            height="400" 
                            style="border:0; pointer-events: none;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi SMKN 4 BOGOR - Jl. Raya Tajur, Bogor">
                        </iframe>
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: transparent; z-index: 1;"></div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Footer - 4 Column Layout -->
    <footer class="footer" style="background: linear-gradient(135deg, #3b4d66 0%, #2d3748 100%); color: white; padding: 60px 0 30px; width: 100%; margin: 0;">
        <div style="max-width: 100%; padding: 0 40px;">
            <div class="row g-4">
                <!-- Brand & Social -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: #3b82f6; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                            <i class="fas fa-graduation-cap" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold" style="font-size: 1.25rem;">SMKN 4</h5>
                            <small style="color: #94a3b8;">Bogor</small>
                        </div>
                    </div>
                    <p style="color: #cbd5e0; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1rem;">
                        Maju seiring perkembangan digital
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" style="width: 36px; height: 36px; background: rgba(59, 130, 246, 0.2); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #3b82f6; text-decoration: none; transition: all 0.3s;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" style="width: 36px; height: 36px; background: rgba(59, 130, 246, 0.2); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #3b82f6; text-decoration: none; transition: all 0.3s;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" style="width: 36px; height: 36px; background: rgba(59, 130, 246, 0.2); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #3b82f6; text-decoration: none; transition: all 0.3s;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Explore -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3 fw-bold text-uppercase" style="color: white; font-size: 0.95rem; letter-spacing: 0.5px;">Explore</h6>
                    <ul class="list-unstyled" style="font-size: 0.95rem;">
                        <li class="mb-2"><a href="{{ route('user.dashboard') }}" style="color: #cbd5e0; text-decoration: none; transition: color 0.3s;">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('user.agenda') }}" style="color: #cbd5e0; text-decoration: none; transition: color 0.3s;">Agenda</a></li>
                        <li class="mb-2"><a href="{{ route('user.informasi') }}" style="color: #cbd5e0; text-decoration: none; transition: color 0.3s;">Informasi</a></li>
                        <li class="mb-2"><a href="{{ route('user.gallery') }}" style="color: #cbd5e0; text-decoration: none; transition: color 0.3s;">Galeri</a></li>
                    </ul>
                </div>

                <!-- Program Keahlian -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h6 class="mb-3 fw-bold text-uppercase" style="color: white; font-size: 0.95rem; letter-spacing: 0.5px;">Program Keahlian</h6>
                    <ul class="list-unstyled" style="font-size: 0.95rem;">
                        <li class="mb-2" style="color: #cbd5e0;">Teknik Jaringan Komputer dan Telekomunikasi</li>
                        <li class="mb-2" style="color: #cbd5e0;">Pengembangan Perangkat Lunak dan Gim</li>
                        <li class="mb-2" style="color: #cbd5e0;">Teknik Otomotif</li>
                        <li class="mb-2" style="color: #cbd5e0;">Teknik Pengelasan dan Fabrikasi Logam</li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="mb-3 fw-bold text-uppercase" style="color: white; font-size: 0.95rem; letter-spacing: 0.5px;">Kontak</h6>
                    <ul class="list-unstyled" style="font-size: 0.95rem;">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="fas fa-map-marker-alt me-2 mt-1" style="color: #3b82f6; font-size: 0.9rem;"></i>
                            <span style="color: #cbd5e0;">Jl. Raya Tajur, Kp. Buntar, Kota Bogor</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fas fa-phone me-2" style="color: #3b82f6; font-size: 0.9rem;"></i>
                            <span style="color: #cbd5e0;">+62 251 7547381</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="fas fa-envelope me-2" style="color: #3b82f6; font-size: 0.9rem;"></i>
                            <span style="color: #cbd5e0;">admin@smkn4bogor.sch.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="row mt-4 pt-4" style="border-top: 1px solid rgba(255,255,255,0.15);">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0" style="color: #94a3b8; font-size: 0.9rem;">
                        © 2025 SMK Negeri 4 Bogor. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" style="color: #94a3b8; text-decoration: none; font-size: 0.9rem; margin: 0 10px;">Privacy Policy</a>
                    <a href="#" style="color: #94a3b8; text-decoration: none; font-size: 0.9rem; margin: 0 10px;">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle and Navigation
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const navLinks = document.querySelector('.nav-links');
            const navLinkItems = document.querySelectorAll('.nav-link');
            
            // Mobile menu toggle
            if (mobileMenuToggle && navLinks) {
                mobileMenuToggle.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                });
            }
            
            // Navigation click handler
            navLinkItems.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    navLinkItems.forEach(item => item.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Close mobile menu
                    if (navLinks) {
                        navLinks.classList.remove('active');
                    }
                    
                    // Handle smooth scrolling for anchor links
                    const href = this.getAttribute('href');
                    if (href.startsWith('#')) {
                        e.preventDefault();
                        const targetElement = document.querySelector(href);
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });
            
            // Set initial active state based on current page
            function setInitialActiveState() {
                // Remove all active classes
                navLinkItems.forEach(item => item.classList.remove('active'));
                
                // Set active class based on current page
                const currentPath = window.location.pathname;
                if (currentPath.includes('/user/agenda')) {
                    const agendaLink = document.querySelector('a[href*="agenda"]');
                    if (agendaLink) agendaLink.classList.add('active');
                } else if (currentPath.includes('/user/informasi')) {
                    const infoLink = document.querySelector('a[href*="informasi"]');
                    if (infoLink) infoLink.classList.add('active');
                } else if (currentPath.includes('/user/gallery')) {
                    const galleryLink = document.querySelector('a[href*="gallery"]');
                    if (galleryLink) galleryLink.classList.add('active');
                } else {
                    // Default to profil for homepage
                    const profilLink = document.querySelector('a[href*="profil"]');
                    if (profilLink) profilLink.classList.add('active');
                }
            }
            
            // Set initial state
            setInitialActiveState();
        });
        
        // Toggle Notifications
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            const profileDropdown = document.getElementById('profileDropdown');
            
            // Close profile dropdown if open
            profileDropdown.style.display = 'none';
            
            // Toggle notification dropdown
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }
        
        // Toggle Profile
        function toggleProfile() {
            const dropdown = document.getElementById('profileDropdown');
            const notificationDropdown = document.getElementById('notificationDropdown');
            
            // Close notification dropdown if open
            notificationDropdown.style.display = 'none';
            
            // Toggle profile dropdown
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }
        
        // Mark All Notifications as Read
        function markAllAsRead() {
            const unreadItems = document.querySelectorAll('.notification-item.unread');
            const badge = document.querySelector('.notification-badge');
            
            unreadItems.forEach(item => {
                item.classList.remove('unread');
            });
            
            // Hide badge if no unread notifications
            badge.style.display = 'none';
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const notificationContainer = document.querySelector('.notification-container');
            const adminProfile = document.querySelector('.admin-profile');
            
            if (!notificationContainer.contains(event.target)) {
                document.getElementById('notificationDropdown').style.display = 'none';
            }
            
            if (!adminProfile.contains(event.target)) {
                document.getElementById('profileDropdown').style.display = 'none';
            }
        });
        
        // Close dropdowns on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.getElementById('notificationDropdown').style.display = 'none';
                document.getElementById('profileDropdown').style.display = 'none';
            }
        });
    </script>
</body>
</html>

