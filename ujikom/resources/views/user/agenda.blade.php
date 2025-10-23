<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - SMKN 4 BOGOR</title>
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
        
        /* Main Content */
        .main-content {
            padding: 60px 0;
            background: #f8f9fa;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }
        
        .page-subtitle {
            font-size: 1.1rem;
            color: #64748b;
        }
        
        .agenda-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .agenda-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .agenda-date {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .agenda-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }
        
        .agenda-description {
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .agenda-time {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #3b82f6;
            font-weight: 500;
        }
        
        .agenda-time i {
            font-size: 16px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .agenda-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .container {
                padding: 0 20px;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .page-subtitle {
                font-size: 1rem;
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
                        <li><a href="{{ route('user.dashboard') }}" class="nav-link">Beranda</a></li>
                        <li><a href="{{ route('user.agenda') }}" class="nav-link active">Agenda</a></li>
                        <li><a href="{{ route('user.informasi') }}" class="nav-link">Informasi</a></li>
                        <li><a href="{{ route('user.gallery') }}" class="nav-link">Galeri</a></li>
                    </ul>
                </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Agenda Sekolah</h1>
                <p class="page-subtitle">Jadwal kegiatan dan acara SMKN 4 Bogor</p>
            </div>
            
            <div class="agenda-grid">
                <div class="agenda-card">
                    <div class="agenda-date">Senin</div>
                    <h3 class="agenda-title">Rapat Guru</h3>
                    <p class="agenda-description">Rapat guru untuk koordinasi kegiatan dan evaluasi pembelajaran.</p>
                    <div class="agenda-time">
                        <i class="fas fa-clock"></i>
                        <span>08:00 - 10:00 WIB</span>
                    </div>
                </div>
                
                <div class="agenda-card">
                    <div class="agenda-date">Periode Akhir Semester</div>
                    <h3 class="agenda-title">UJIAN AKHIR SEMESTER</h3>
                    <p class="agenda-description">Pelaksanaan Ujian Akhir Semester untuk seluruh kelas.</p>
                    <div class="agenda-time">
                        <i class="fas fa-clock"></i>
                        <span>06:30 - 14:00 WIB</span>
                    </div>
                </div>
                
                <div class="agenda-card">
                    <div class="agenda-date">Pertengahan Semester</div>
                    <h3 class="agenda-title">UJIAN TENGAH SEMESTER</h3>
                    <p class="agenda-description">Pelaksanaan Ujian Tengah Semester untuk seluruh kelas.</p>
                    <div class="agenda-time">
                        <i class="fas fa-clock"></i>
                        <span>06:30 - 14:00 WIB</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
