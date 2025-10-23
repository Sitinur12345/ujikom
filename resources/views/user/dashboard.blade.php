@extends('layouts.user')

@section('title', 'SMKN 4 BOGOR - Beranda')

@section('styles')
<style>
        /* Hero Section - Enhanced Responsive Design */
        .hero {
            background: linear-gradient(rgba(30, 58, 138, 0.85), rgba(59, 130, 246, 0.75)), 
                        url('{{ asset("images/DJI_0148.JPG") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            padding: 60px 0;
            text-align: center;
            position: relative;
            min-height: 60vh;
            display: flex;
            align-items: center;
        }
        
        @media (min-width: 768px) {
            .hero {
                padding: 80px 0;
                min-height: 70vh;
            }
        }
        
        @media (min-width: 1024px) {
            .hero {
                padding: 100px 0;
                min-height: 80vh;
            }
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
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        @media (min-width: 768px) {
            .hero-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
                margin-bottom: 25px;
                border-radius: 20px;
            }
        }
        
        .hero-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }
        
        @media (min-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
        }
        
        @media (min-width: 1024px) {
            .hero-title {
                font-size: 3rem;
                margin-bottom: 25px;
            }
        }
        
        .hero-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 25px;
            font-weight: 400;
            font-style: italic;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
        }
        
        @media (min-width: 768px) {
            .hero-subtitle {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }
        }
        
        .hero-btn {
            background: white;
            color: #3b82f6;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        @media (min-width: 768px) {
            .hero-btn {
                padding: 14px 32px;
                font-size: 1rem;
                border-radius: 40px;
                gap: 8px;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            }
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
        
        /* Profil Section - Responsive */
        #profil {
            min-height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 0;
        }
        
        #profil > .row {
            width: 100%;
            margin: 0;
        }
        
        #profil .container {
            padding: 0 20px;
        }
        
        @media (min-width: 768px) {
            #profil {
                padding: 2rem 0;
            }
            
            #profil .container {
                padding: 0 30px;
            }
        }
        
        @media (min-width: 1024px) {
            #profil .container {
                padding: 0 40px;
            }
        }
        
        /* Contact & Map Section - Responsive */
        .contact-map {
            margin: 0;
            padding: 50px 20px;
            background: #f8f9fa;
            width: 100%;
        }
        
        .contact-map .container {
            max-width: 100%;
            padding: 0;
        }
        
        .contact-map-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        @media (min-width: 768px) {
            .contact-map {
                padding: 50px 30px;
            }
        }
        
        @media (min-width: 1024px) {
            .contact-map {
                padding: 50px 40px;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .contact-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 1.5rem;
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
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }
        
        .contact-card p {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }
        
        .contact-row {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .contact-card.small {
            flex: 1;
            padding: 1.5rem;
        }
        
        /* Responsive Contact Cards */
        @media (min-width: 768px) {
            .contact-row {
                flex-direction: row;
                gap: 20px;
            }
            
            .contact-card.small {
                padding: 1.5rem;
            }
        }
        
        @media (min-width: 1024px) {
            .contact-row {
                gap: 30px;
            }
            
            .contact-card.small {
                padding: 2rem 1.5rem;
            }
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
            height: 250px;
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
        
        /* Responsive Map */
        @media (min-width: 768px) {
            .map-frame {
                height: 300px;
            }
        }
        
        @media (min-width: 1024px) {
            .map-frame {
                height: 400px;
            }
        }
        
        /* Responsive Section Title */
        .section-title {
            color: #1e293b;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        @media (min-width: 768px) {
            .section-title {
                font-size: 1.75rem;
                margin-bottom: 40px;
            }
        }
        
        @media (min-width: 1024px) {
            .section-title {
                font-size: 2rem;
                margin-bottom: 50px;
            }
        }
        
        /* Quick Access Buttons - Responsive */
        .quick-access-btn {
            border-radius: 20px;
            padding: 8px 16px;
            min-width: 100px;
            font-size: 0.8rem;
            border-width: 2px;
            transition: all 0.3s ease;
        }
        
        @media (min-width: 768px) {
            .quick-access-btn {
                border-radius: 25px;
                padding: 10px 20px;
                min-width: 120px;
                font-size: 0.9rem;
            }
        }
        
        .quick-access-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        /* Profil Cards - Responsive */
        .profil-main-card {
            border-radius: 16px;
        }
        
        .profil-icon {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .profil-title {
            font-size: 1.25rem;
        }
        
        .profil-description {
            font-size: 0.9rem;
        }
        
        @media (min-width: 768px) {
            .profil-main-card .card-body {
                padding: 2rem 2.5rem !important;
            }
            
            .profil-icon {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
            
            .profil-title {
                font-size: 1.5rem;
            }
            
            .profil-description {
                font-size: 1rem;
            }
        }
        
        @media (min-width: 1024px) {
            .profil-icon {
                width: 120px;
                height: 120px;
                font-size: 3rem;
            }
            
            .profil-title {
                font-size: 1.75rem;
            }
        }
        
        /* Visi & Misi Cards - Responsive */
        .visi-misi-card {
            border-radius: 16px;
        }
        
        .visi-misi-title {
            font-size: 1.1rem;
        }
        
        .visi-misi-text {
            font-size: 0.85rem;
        }
        
        @media (min-width: 768px) {
            .visi-misi-card .card-body {
                padding: 1.5rem !important;
            }
            
            .visi-misi-title {
                font-size: 1.25rem;
            }
            
            .visi-misi-text {
                font-size: 0.95rem;
            }
        }
        
        /* Quick Access Card - Responsive */
        .quick-access-card {
            border-radius: 16px;
        }
        
        .quick-access-card .card-body {
            padding: 1rem;
        }
        
        .quick-access-title {
            font-size: 1.1rem;
            letter-spacing: 0.3px;
        }
        
        @media (min-width: 768px) {
            .quick-access-card .card-body {
                padding: 1.5rem;
            }
            
            .quick-access-title {
                font-size: 1.25rem;
            }
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
        
        
        /* Enhanced Responsive Design for Dashboard */
        
        /* Large Desktop (1400px+) */
        @media (min-width: 1400px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-subtitle {
                font-size: 1.3rem;
            }
            
            .hero-icon {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }
            
            /* Profil Section - Large Desktop */
            #profil h2 {
                font-size: 3.5rem !important;
            }
            
            #profil .lead {
                font-size: 1.4rem !important;
            }
        }
        
        /* Desktop (1200px - 1399px) */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .hero-title {
                font-size: 2.75rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }
        
        /* Large Tablet (992px - 1199px) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .hero-title {
                font-size: 2.25rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-icon {
                width: 75px;
                height: 75px;
                font-size: 2.25rem;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }
        
        /* Tablet (768px - 991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .hero {
                padding: 60px 0;
                min-height: 60vh;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .hero-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .hero-btn {
                padding: 12px 28px;
                font-size: 0.95rem;
            }
            
            .contact-map {
                padding: 40px 20px;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .contact-card {
                padding: 1.25rem;
            }
            
            .contact-icon {
                width: 55px;
                height: 55px;
                font-size: 1.4rem;
            }
            
            .map-frame {
                height: 280px;
            }
            
            /* Profil Section - Tablet */
            #profil h2 {
                font-size: 2.5rem !important;
            }
            
            #profil .lead {
                font-size: 1.2rem !important;
            }
        }
        
        /* Mobile Large (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .hero {
                padding: 50px 0;
                min-height: 50vh;
                background-attachment: scroll;
            }
            
            .hero-title {
                font-size: 1.75rem;
            }
            
            .hero-subtitle {
                font-size: 0.95rem;
            }
            
            .hero-icon {
                width: 65px;
                height: 65px;
                font-size: 1.75rem;
            }
            
            .hero-btn {
                padding: 10px 24px;
                font-size: 0.9rem;
            }
            
            .contact-map {
                padding: 30px 15px;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .contact-card {
                padding: 1rem;
            }
            
            .contact-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
            
            .map-frame {
                height: 250px;
            }
        }
        
        /* Mobile Small (max-width: 575px) */
        @media (max-width: 575px) {
            .hero {
                padding: 40px 0;
                min-height: 45vh;
                background-attachment: scroll;
            }
            
            .hero-title {
                font-size: 1.5rem;
                margin-bottom: 15px;
            }
            
            .hero-subtitle {
                font-size: 0.9rem;
                margin-bottom: 25px;
            }
            
            .hero-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 20px;
            }
            
            .hero-btn {
                padding: 8px 20px;
                font-size: 0.85rem;
            }
            
            .contact-map {
                padding: 20px 12px;
            }
            
            .contact-map-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .contact-card {
                padding: 0.75rem;
            }
            
            .contact-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
            
            .contact-card h4 {
                font-size: 1rem;
            }
            
            .contact-card p {
                font-size: 0.85rem;
            }
            
            .map-frame {
                height: 200px;
            }
            
            /* Profil Section Mobile */
            #profil {
                min-height: auto;
                padding: 1.5rem 0;
            }
            
            #profil h2 {
                font-size: 2rem !important;
            }
            
            #profil .lead {
                font-size: 1.1rem !important;
            }
            
            #profil .display-4 {
                font-size: 1.5rem !important;
            }
            
            #profil .fs-5 {
                font-size: 0.9rem !important;
            }
            
            #profil .card-body {
                padding: 1rem !important;
            }
            
            #profil h3 {
                font-size: 1.25rem !important;
            }
            
            #profil .btn {
                padding: 8px 16px !important;
                font-size: 0.8rem !important;
            }
            
            /* Contact Section Mobile */
            .contact-map {
                padding: 30px 15px;
            }
            
            .contact-card {
                padding: 1rem;
            }
            
            .contact-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
            
            .contact-card h4 {
                font-size: 1rem;
            }
            
            .contact-card p {
                font-size: 0.85rem;
            }
            
            .map-frame {
                height: 200px;
            }
            
            .section-title {
                font-size: 1.25rem;
                margin-bottom: 20px;
            }
        }
        
        /* Extra Small Mobile (max-width: 375px) */
        @media (max-width: 375px) {
            .hero {
                padding: 30px 0;
                min-height: 40vh;
            }
            
            .hero-title {
                font-size: 1.25rem;
            }
            
            .hero-subtitle {
                font-size: 0.8rem;
            }
            
            .hero-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
            
            .hero-btn {
                padding: 6px 16px;
                font-size: 0.8rem;
            }
            
            .contact-map {
                padding: 15px 8px;
            }
            
            .contact-card {
                padding: 0.5rem;
            }
            
            .contact-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .contact-card h4 {
                font-size: 0.9rem;
            }
            
            .contact-card p {
                font-size: 0.8rem;
            }
            
            .map-frame {
                height: 180px;
            }
            
            #profil .display-4 {
                font-size: 1.25rem !important;
            }
            
            #profil .fs-5 {
                font-size: 0.85rem !important;
            }
            
            #profil .card-body {
                padding: 0.75rem !important;
            }
            
            #profil h3 {
                font-size: 1.1rem !important;
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
@endsection

@section('content')

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
                        <div class="text-center mb-4">
                            <h2 class="display-4 fw-bold text-primary mb-3" style="font-size: 3rem;">Profil SMKN 4 BOGOR</h2>
                            <p class="lead text-muted fs-5" style="font-size: 1.3rem;">Maju seiring perkembangan digital</p>
                        </div>
                        <div class="card border-0 shadow-lg mb-4 profil-main-card">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-md-4 text-center mb-3 mb-md-0">
                                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center profil-icon">
                                            <i class="fas fa-graduation-cap text-white"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="card-title text-primary mb-3 fw-bold profil-title">SMK Negeri 4 Bogor</h3>
                                        <p class="card-text text-muted lh-lg profil-description">SMK Negeri 4 Bogor dikenal juga dengan sebutan NEBRAZKA (mirip Nebraska negara bagian Amerika) singkatan dari Negeri Empat Bogor AZKA. Azka sendiri memiliki arti suci, berbudi luhur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Visi & Misi -->
                        <div class="row g-3 mb-4">
                            <!-- Visi -->
                            <div class="col-lg-6">
                                <div class="card border-0 shadow-sm h-100 visi-misi-card">
                                    <div class="card-body p-3">
                                        <h4 class="card-title text-primary mb-3 fw-bold visi-misi-title">
                                            <i class="fas fa-eye me-2"></i>Visi
                                        </h4>
                                        <p class="text-muted mb-0 lh-lg visi-misi-text">"Terwujudnya sekolah vokasi unggul yang melahirkan lulusan berkarakter, kompeten, dan berdaya saing di era digital dan mencetak pelajar Pancasila yang berbasis teknologi, berwawasan lingkungan, dan berwirausaha"</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Misi -->
                            <div class="col-lg-6">
                                <div class="card border-0 shadow-sm h-100 visi-misi-card">
                                    <div class="card-body p-3">
                                        <h4 class="card-title text-primary mb-3 fw-bold visi-misi-title">
                                            <i class="fas fa-bullseye me-2"></i>Misi
                                        </h4>
                                        <ul class="text-muted mb-0 lh-lg visi-misi-text" style="padding-left: 18px;">
                                            <li class="mb-2">Menciptakan pelajar Pancasila yang berteknologi, berwawasan lingkungan, dan berwirausaha.</li>
                                            <li>Mengoptimalkan potensi sekolah untuk mencapai keunggulan dengan fokus pada teknologi dan wawasan lingkungan serta kewirausahaan.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Akses Cepat -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0 shadow-sm quick-access-card">
                                    <div class="card-body text-center">
                                        <h5 class="text-primary fw-bold mb-3 quick-access-title">
                                            <i class="fas fa-rocket me-2"></i>Akses Cepat
                                        </h5>
                                        <div class="d-flex flex-wrap justify-content-center gap-2">
                                            <a href="#profil" class="btn btn-outline-primary quick-access-btn">
                                                <i class="fas fa-user me-2"></i>Profil
                                            </a>
                                            <a href="{{ route('user.agenda') }}" class="btn btn-outline-primary quick-access-btn">
                                                <i class="fas fa-calendar-alt me-2"></i>Agenda
                                            </a>
                                            <a href="{{ route('user.informasi') }}" class="btn btn-outline-primary quick-access-btn">
                                                <i class="fas fa-bullhorn me-2"></i>Informasi
                                            </a>
                                            <a href="{{ route('user.gallery') }}" class="btn btn-outline-primary quick-access-btn">
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
        <h3 class="section-title" style="color: #1e293b; text-align: center; font-size: 1.5rem; margin-bottom: 30px; font-weight: 700;">Hubungi Kami</h3>
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
                            <p>admin@smkn4bogor.sch.id<br>
                            smkn4bogor@gmail.com
                            </p>
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

@endsection

