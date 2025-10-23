@extends('layouts.user')

@section('title', 'Agenda - SMKN 4 BOGOR')

@section('styles')
<style>
        /* Agenda Specific Styles */
        
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
@endsection

@section('content')
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
@endsection
