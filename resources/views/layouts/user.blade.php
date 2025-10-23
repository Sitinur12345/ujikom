<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMKN 4 BOGOR')</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            color: #1f2937;
            line-height: 1.6;
            scroll-behavior: smooth;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        @media (min-width: 576px) {
            .container {
                padding: 0 30px;
            }
        }
        
        @media (min-width: 768px) {
            .container {
                padding: 0 40px;
            }
        }
        
        @media (min-width: 1200px) {
            .container {
                padding: 0 60px;
            }
        }
        
        @media (min-width: 1400px) {
            .container {
                max-width: 1400px;
                padding: 0 80px;
            }
        }
        
        /* Header Section - Clean & Modern */
        .header {
            background: white;
            padding: 12px 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        @media (min-width: 576px) {
            .navbar {
                padding: 0 25px;
            }
        }
        
        @media (min-width: 768px) {
            .navbar {
                padding: 0 30px;
            }
        }
        
        @media (min-width: 1200px) {
            .navbar {
                padding: 0 40px;
            }
        }
        
        .branding {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }
        
        @media (min-width: 768px) {
            .branding {
                gap: 12px;
            }
        }
        
        .brand-icon {
            width: 45px;
            height: 45px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 8px;
            overflow: hidden;
        }
        
        @media (min-width: 768px) {
            .brand-icon {
                width: 50px;
                height: 50px;
            }
        }
        
        .brand-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(30, 58, 138, 0.15));
        }
        
        .brand-text h1 {
            font-size: 18px;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
            line-height: 1.1;
            letter-spacing: -0.5px;
        }
        
        @media (min-width: 768px) {
            .brand-text h1 {
                font-size: 20px;
            }
        }
        
        .brand-text p {
            font-size: 11px;
            color: #64748b;
            font-weight: 600;
            margin: 0;
            line-height: 1;
            letter-spacing: 0.5px;
        }
        
        @media (min-width: 768px) {
            .brand-text p {
                font-size: 12px;
            }
        }
        
        /* Navigation Menu - Clean & Modern */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        @media (min-width: 768px) {
            .nav-menu {
                gap: 16px;
            }
        }
        
        .nav-links {
            display: none;
            align-items: center;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        @media (min-width: 768px) {
            .nav-links {
                display: flex;
            }
        }
        
        .nav-links.active {
            display: flex;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            padding: 16px 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-radius: 0 0 12px 12px;
            z-index: 999;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .nav-links li a {
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            padding: 10px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: block;
            letter-spacing: 0.3px;
        }
        
        @media (min-width: 768px) {
            .nav-links li a {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
        
        .nav-links li a:hover {
            color: #3b82f6;
            background: rgba(59, 130, 246, 0.08);
            transform: translateY(-1px);
        }
        
        .nav-links li a.active {
            color: white;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            box-shadow: 0 3px 10px rgba(59, 130, 246, 0.25);
        }
        
        /* Mobile Menu Toggle - Clean */
        .mobile-menu-toggle {
            display: block;
            background: none;
            border: none;
            font-size: 20px;
            color: #64748b;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        @media (min-width: 768px) {
            .mobile-menu-toggle {
                display: none;
            }
        }
        
        .mobile-menu-toggle:hover {
            color: #3b82f6;
            background: rgba(59, 130, 246, 0.08);
        }
        
        /* Main Content - Clean & Modern */
        .main-content {
            padding: 30px 0;
            background: #f8f9fa;
            min-height: calc(100vh - 80px);
        }
        
        @media (min-width: 768px) {
            .main-content {
                padding: 50px 0;
            }
        }
        
        /* Page Header - Responsive */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        @media (min-width: 768px) {
            .page-header {
                margin-bottom: 60px;
            }
        }
        
        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 15px;
            line-height: 1.2;
        }
        
        @media (min-width: 768px) {
            .page-title {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }
        }
        
        .page-subtitle {
            font-size: 1rem;
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }
        
        @media (min-width: 768px) {
            .page-subtitle {
                font-size: 1.1rem;
            }
        }
        
        /* Card Components - Responsive */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            padding: 20px 24px;
            background: #f8f9fa;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .card-body {
            padding: 24px;
        }
        
        @media (min-width: 768px) {
            .card-body {
                padding: 32px;
            }
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
        }
        
        @media (min-width: 768px) {
            .card-title {
                font-size: 1.5rem;
                margin-bottom: 16px;
            }
        }
        
        .card-text {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 16px;
        }
        
        /* Grid System - Enhanced Responsive */
        .grid {
            display: grid;
            gap: 24px;
        }
        
        .grid-1 { grid-template-columns: 1fr; }
        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }
        
        @media (max-width: 767px) {
            .grid-2,
            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
            }
        }
        
        @media (min-width: 768px) and (max-width: 1023px) {
            .grid-3,
            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Auto-fit grid for dynamic content */
        .grid-auto {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }
        
        @media (max-width: 767px) {
            .grid-auto {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
        
        /* Button Components - Responsive */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        
        @media (min-width: 768px) {
            .btn {
                padding: 14px 28px;
                font-size: 15px;
            }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }
        
        .btn-outline-primary {
            background: transparent;
            color: #3b82f6;
            border: 2px solid #3b82f6;
        }
        
        .btn-outline-primary:hover {
            background: #3b82f6;
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-2px);
        }
        
        /* Icon Components */
        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
        }
        
        .icon-sm {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
        
        .icon-md {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
        }
        
        .icon-lg {
            width: 80px;
            height: 80px;
            font-size: 2.5rem;
        }
        
        .icon-primary {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
        }
        
        .icon-success {
            background: linear-gradient(135deg, #10b981, #059669);
        }
        
        .icon-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
        
        .icon-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }
        
        /* Utility Classes */
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        
        .mb-0 { margin-bottom: 0; }
        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mb-5 { margin-bottom: 3rem; }
        
        .mt-0 { margin-top: 0; }
        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
        .mt-5 { margin-top: 3rem; }
        
        .p-0 { padding: 0; }
        .p-1 { padding: 0.25rem; }
        .p-2 { padding: 0.5rem; }
        .p-3 { padding: 1rem; }
        .p-4 { padding: 1.5rem; }
        .p-5 { padding: 3rem; }
        
        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Footer - Clean Modern Design */
        .footer {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: #ffffff;
            padding: 80px 0 40px;
            margin-top: 100px;
            position: relative;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }
        
        .footer-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 50px;
            margin-bottom: 50px;
        }
        
        @media (min-width: 1024px) {
            .footer-main {
                grid-template-columns: 1fr 2fr;
                gap: 80px;
            }
        }
        
        .footer-brand {
            text-align: center;
        }
        
        @media (min-width: 1024px) {
            .footer-brand {
                text-align: left;
            }
        }
        
        .footer-brand-logo {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 1;
        }
        
        .footer-brand-slogan {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        
        .footer-brand-description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            line-height: 1.6;
            max-width: 280px;
            margin: 0 auto;
        }
        
        @media (min-width: 1024px) {
            .footer-brand-description {
                margin: 0;
            }
        }
        
        .footer-nav {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }
        
        @media (min-width: 768px) {
            .footer-nav {
                grid-template-columns: repeat(4, 1fr);
                gap: 50px;
            }
        }
        
        .footer-nav-column {
            text-align: center;
        }
        
        @media (min-width: 1024px) {
            .footer-nav-column {
                text-align: left;
            }
        }
        
        .footer-nav-title {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
        }
        
        .footer-nav-title::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 25px;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 1px;
        }
        
        @media (min-width: 1024px) {
            .footer-nav-title::after {
                left: 0;
                transform: none;
            }
        }
        
        .footer-nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-nav-links li {
            margin-bottom: 12px;
        }
        
        .footer-nav-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: color 0.3s ease;
            display: block;
        }
        
        .footer-nav-links a:hover {
            color: #ffffff;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 25px;
        }
        
        @media (min-width: 768px) {
            .footer-bottom {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }
        
        .footer-social {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .footer-social a {
            width: 40px;
            height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .footer-social a:hover {
            border-color: #ffffff;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .footer-copyright {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
            margin: 0;
            text-align: center;
        }
        
        .footer-action-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 10px 16px;
            color: #ffffff;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }
        
        .footer-action-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }
        
        /* Mobile Responsive */
        @media (max-width: 1023px) {
            .footer {
                padding: 60px 0 35px;
                margin-top: 80px;
            }
            
            .footer-content {
                padding: 0 25px;
            }
            
            .footer-main {
                gap: 45px;
                margin-bottom: 45px;
            }
            
            .footer-brand-logo {
                font-size: 2.5rem;
                letter-spacing: 1.5px;
            }
            
            .footer-brand-slogan {
                font-size: 0.95rem;
            }
            
            .footer-nav {
                gap: 35px;
            }
        }
        
        @media (max-width: 767px) {
            .footer {
                padding: 50px 0 30px;
                margin-top: 60px;
            }
            
            .footer-content {
                padding: 0 20px;
            }
            
            .footer-main {
                gap: 40px;
                margin-bottom: 40px;
            }
            
            .footer-brand-logo {
                font-size: 2.2rem;
                letter-spacing: 1px;
            }
            
            .footer-brand-slogan {
                font-size: 0.9rem;
            }
            
            .footer-brand-description {
                font-size: 0.9rem;
                max-width: 250px;
            }
            
            .footer-nav {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
            
            .footer-nav-title {
                font-size: 0.95rem;
                margin-bottom: 18px;
            }
            
            .footer-nav-links a {
                font-size: 0.85rem;
            }
            
            .footer-bottom {
                padding-top: 25px;
                gap: 20px;
            }
            
            .footer-social {
                gap: 12px;
            }
            
            .footer-social a {
                width: 38px;
                height: 38px;
                font-size: 0.95rem;
            }
            
            .footer-copyright {
                font-size: 0.8rem;
            }
            
            .footer-action-btn {
                padding: 8px 14px;
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 480px) {
            .footer {
                padding: 40px 0 25px;
            }
            
            .footer-content {
                padding: 0 15px;
            }
            
            .footer-main {
                gap: 35px;
                margin-bottom: 35px;
            }
            
            .footer-brand-logo {
                font-size: 2rem;
            }
            
            .footer-brand-slogan {
                font-size: 0.85rem;
            }
            
            .footer-brand-description {
                font-size: 0.85rem;
                max-width: 220px;
            }
            
            .footer-nav {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .footer-nav-title {
                font-size: 0.9rem;
                margin-bottom: 15px;
            }
            
            .footer-nav-links a {
                font-size: 0.8rem;
            }
            
            .footer-bottom {
                padding-top: 20px;
                gap: 18px;
            }
            
            .footer-social {
                gap: 10px;
            }
            
            .footer-social a {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
            
            .footer-copyright {
                font-size: 0.75rem;
            }
            
            .footer-action-btn {
                padding: 7px 12px;
                font-size: 0.75rem;
            }
        }
        
        /* Enhanced Responsive Design */
        
        /* Large Desktop (1400px+) */
        @media (min-width: 1400px) {
            .container {
                max-width: 1320px;
            }
            
            .page-title {
                font-size: 3rem;
            }
        }
        
        /* Desktop (1200px - 1399px) */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .container {
                max-width: 1140px;
            }
        }
        
        /* Large Tablet (992px - 1199px) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .container {
                max-width: 960px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Tablet (768px - 991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .container {
                max-width: 720px;
            }
            
            .page-title {
                font-size: 1.75rem;
            }
            
            .grid-3,
            .grid-4 {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .nav-links {
                gap: 4px;
            }
            
            .nav-links li a {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
        
        /* Mobile Large (576px - 767px) */
        @media (min-width: 576px) and (max-width: 767px) {
            .container {
                max-width: 540px;
                padding: 0 15px;
            }
            
            .navbar {
                padding: 0 15px;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .page-subtitle {
                font-size: 0.95rem;
            }
            
            .grid-2,
            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 13px;
            }
        }
        
        /* Mobile Small (max-width: 575px) */
        @media (max-width: 575px) {
            .container {
                padding: 0 12px;
            }
            
            .navbar {
                padding: 0 12px;
            }
            
            .branding {
                gap: 8px;
            }
            
            .brand-icon {
                width: 45px;
                height: 45px;
            }
            
            .brand-text h1 {
                font-size: 18px;
            }
            
            .brand-text p {
                font-size: 11px;
            }
            
            .page-title {
                font-size: 1.25rem;
            }
            
            .page-subtitle {
                font-size: 0.9rem;
            }
            
            .main-content {
                padding: 30px 0;
            }
            
            .grid-1,
            .grid-2,
            .grid-3,
            .grid-4 {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .btn {
                padding: 8px 16px;
                font-size: 12px;
            }
            
            .footer-content {
                padding: 0 12px;
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
                padding: 16px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                gap: 8px;
                border-radius: 0 0 12px 12px;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li a {
                padding: 12px 16px;
                width: 100%;
                text-align: center;
                font-size: 14px;
            }
        }
        
        /* Extra Small Mobile (max-width: 375px) */
        @media (max-width: 375px) {
            .container {
                padding: 0 8px;
            }
            
            .navbar {
                padding: 0 8px;
            }
            
            .brand-text h1 {
                font-size: 16px;
            }
            
            .brand-text p {
                font-size: 10px;
            }
            
            .page-title {
                font-size: 1.1rem;
            }
            
            .page-subtitle {
                font-size: 0.85rem;
            }
            
            .main-content {
                padding: 20px 0;
            }
            
            .card-body {
                padding: 0.75rem;
            }
            
            .btn {
                padding: 6px 12px;
                font-size: 11px;
            }
        }
        
        /* Responsive Typography */
        @media (max-width: 767px) {
            .display-1 { font-size: 2rem !important; }
            .display-2 { font-size: 1.75rem !important; }
            .display-3 { font-size: 1.5rem !important; }
            .display-4 { font-size: 1.25rem !important; }
            
            h1 { font-size: 1.75rem !important; }
            h2 { font-size: 1.5rem !important; }
            h3 { font-size: 1.25rem !important; }
            h4 { font-size: 1.1rem !important; }
            h5 { font-size: 1rem !important; }
            h6 { font-size: 0.9rem !important; }
            
            /* Mobile Navbar Clean */
            .header {
                padding: 10px 0;
            }
            
            .navbar {
                padding: 0 15px;
            }
            
            .brand-text h1 {
                font-size: 16px;
            }
            
            .brand-text p {
                font-size: 10px;
            }
            
            .brand-icon {
                width: 40px;
                height: 40px;
            }
            
            .nav-links li a {
                font-size: 13px;
                padding: 10px 14px;
            }
            
            .mobile-menu-toggle {
                font-size: 18px;
                width: 36px;
                height: 36px;
            }
            
            .nav-links {
                padding: 12px 16px;
                gap: 6px;
                border-radius: 0 0 10px 10px;
            }
            
            .nav-links li a {
                padding: 10px 12px;
                width: 100%;
                text-align: center;
                font-size: 13px;
                border-radius: 6px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="navbar">
            <div class="branding">
                <div class="brand-icon">
                    <img src="{{ asset('images/LOGO_SMKN_4.png') }}" alt="SMKN 4 Bogor Logo">
                </div>
                <div class="brand-text">
                    <h1>SMKN 4</h1>
                    <p>Bogor</p>
                </div>
            </div>
            
            <div class="nav-menu">
                <ul class="nav-links" id="navLinks">
                    <li><a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('user.agenda') }}" class="nav-link {{ request()->routeIs('user.agenda') ? 'active' : '' }}">Agenda</a></li>
                    <li><a href="{{ route('user.informasi') }}" class="nav-link {{ request()->routeIs('user.informasi') ? 'active' : '' }}">Informasi</a></li>
                    <li><a href="{{ route('user.gallery') }}" class="nav-link {{ request()->routeIs('user.gallery') ? 'active' : '' }}">Galeri</a></li>
                </ul>
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-main">
                <!-- Brand Section -->
                <div class="footer-brand">
                    <div class="footer-brand-logo">SMKN 4</div>
                    <div class="footer-brand-slogan">Bogor</div>
                    <div class="footer-brand-description">
                        <p>Maju seiring perkembangan digital. Berkomitmen memberikan pendidikan berkualitas tinggi dalam bidang teknologi dan keahlian profesional.</p>
                    </div>
                </div>
                
                <!-- Navigation Section -->
                <div class="footer-nav">
                    <div class="footer-nav-column">
                        <h4 class="footer-nav-title">Navigasi</h4>
                        <ul class="footer-nav-links">
                            <li><a href="{{ route('user.dashboard') }}">Beranda</a></li>
                            <li><a href="{{ route('user.agenda') }}">Agenda</a></li>
                            <li><a href="{{ route('user.informasi') }}">Informasi</a></li>
                            <li><a href="{{ route('user.gallery') }}">Galeri</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-nav-column">
                        <h4 class="footer-nav-title">Program</h4>
                        <ul class="footer-nav-links">
                            <li><a href="#">PPLG</a></li>
                            <li><a href="#">TJKT</a></li>
                            <li><a href="#">TPFL</a></li>
                            <li><a href="#">TO</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-nav-column">
                        <h4 class="footer-nav-title">Layanan</h4>
                        <ul class="footer-nav-links">
                            <li><a href="#">Pendaftaran</a></li>
                            <li><a href="#">Informasi</a></li>
                            <li><a href="#">Konsultasi</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-nav-column">
                        <h4 class="footer-nav-title">Tentang</h4>
                        <ul class="footer-nav-links">
                            <li><a href="#">Visi & Misi</a></li>
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Prestasi</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-social">
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
                
                <p class="footer-copyright">©Copyright All rights reserved.</p>
                
                <button class="footer-action-btn">
                    <span>Buka Situs</span>
                    <i class="fas fa-external-link-alt"></i>
                </button>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const navLinks = document.getElementById('navLinks');
            
            if (mobileMenuToggle && navLinks) {
                mobileMenuToggle.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                    
                    // Toggle icon
                    const icon = this.querySelector('i');
                    if (navLinks.classList.contains('active')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                });
                
                // Close menu when clicking on a link
                navLinks.addEventListener('click', function(e) {
                    if (e.target.classList.contains('nav-link')) {
                        navLinks.classList.remove('active');
                        const icon = mobileMenuToggle.querySelector('i');
                        icon.className = 'fas fa-bars';
                    }
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!navLinks.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                        navLinks.classList.remove('active');
                        const icon = mobileMenuToggle.querySelector('i');
                        icon.className = 'fas fa-bars';
                    }
                });
            }
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Add loading states to buttons
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.type === 'submit' || this.classList.contains('btn-loading')) {
                        this.classList.add('loading');
                        this.disabled = true;
                    }
                });
            });
        });
        
        // Utility functions
        function showLoading(element) {
            element.classList.add('loading');
        }
        
        function hideLoading(element) {
            element.classList.remove('loading');
        }
        
        function showAlert(message, type = 'info') {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const container = document.querySelector('.main-content .container');
            if (container) {
                container.insertBefore(alertDiv, container.firstChild);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (alertDiv.parentNode) {
                        alertDiv.remove();
                    }
                }, 5000);
            }
        }
    </script>
    
    @yield('scripts')
</body>
</html>

