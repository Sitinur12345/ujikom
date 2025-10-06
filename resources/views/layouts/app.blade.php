<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                container: {
                    center: true,
                    padding: '1rem',
                    screens: {
                        sm: '600px',
                        md: '728px',
                        lg: '984px',
                        xl: '1240px',
                        '2xl': '1496px',
                    },
                },
                extend: {
                    colors: {
                        primary: {
                            50: '#f8faff',
                            100: '#f0f5ff',
                            200: '#e4edff',
                            300: '#d1e2ff',
                            400: '#a6c8ff',
                            500: '#7eadff',
                            600: '#5c94ff',
                            700: '#4676cc',
                            800: '#345899',
                            900: '#233a66',
                        },
                        neutral: {
                            50: '#fafafa',
                            100: '#f5f5f5',
                            200: '#eeeeee',
                            300: '#e0e0e0',
                            400: '#bdbdbd',
                            500: '#9e9e9e',
                            600: '#757575',
                            700: '#616161',
                            800: '#424242',
                            900: '#212121',
                        },
                        pastel: {
                            blue: '#edf5ff',
                            gray: '#f8f9fa',
                            slate: '#f1f5f9',
                        },
                    },
                    boxShadow: {
                        'soft': '0 2px 4px 0 rgba(0, 0, 0, 0.05)',
                        'card': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
                        'button': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    fontSize: {
                        'xs': ['0.75rem', { lineHeight: '1rem' }],
                        'sm': ['0.875rem', { lineHeight: '1.25rem' }],
                        'base': ['1rem', { lineHeight: '1.5rem' }],
                        'lg': ['1.125rem', { lineHeight: '1.75rem' }],
                        'xl': ['1.25rem', { lineHeight: '1.75rem' }],
                        '2xl': ['1.5rem', { lineHeight: '2rem' }],
                        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
                        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
                        '5xl': ['3rem', { lineHeight: '1' }],
                        '6xl': ['3.75rem', { lineHeight: '1' }],
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        .font-light { font-weight: 400; }
        .font-normal { font-weight: 400; }
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        .font-display { font-family: 'Montserrat', sans-serif; }

                /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Hide scrollbar but keep functionality */
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Touch optimizations */
        @media (hover: none) {
            .touch-target {
                min-height: 44px;
                min-width: 44px;
            }
        }
    </style>


</head>
<body class="min-h-screen bg-white">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-soft z-50">
        <div class="container">
            <div class="flex justify-between h-16">
                <!-- Left side -->
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center space-x-3">
                        <a href="{{ url('/') }}" class="text-xl font-display font-bold text-neutral-800 hover:text-primary-600 transition-colors" title="Lihat Homepage">
                            Dashboard
                        </a>
                        <a href="{{ url('/') }}" class="text-sm text-primary-600 hover:text-primary-700" title="Lihat Public Site">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-2">
                        <a href="{{ route('dashboard') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-th-large text-lg mb-1"></i>
                            <span class="text-xs">Beranda</span>
                        </a>
                        <a href="{{ route('kategori.index') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('kategori.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-tag text-lg mb-1"></i>
                            <span class="text-xs">Kategori</span>
                        </a>
                        <a href="{{ route('petugas.index') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('petugas.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-user-cog text-lg mb-1"></i>
                            <span class="text-xs">Petugas</span>
                        </a>
                        <a href="{{ route('galeri.index') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('galeri.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-images text-lg mb-1"></i>
                            <span class="text-xs">Galeri</span>
                        </a>
                        <a href="{{ route('pages.index') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('pages.*') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-file-alt text-lg mb-1"></i>
                            <span class="text-xs">Pages</span>
                        </a>
                        <a href="{{ route('admin.profile') }}" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('admin.profile') ? 'text-primary-600 bg-primary-50' : 'text-neutral-600 hover:bg-pastel-slate hover:text-primary-600' }} transition-all duration-200">
                            <i class="fas fa-user text-lg mb-1"></i>
                            <span class="text-xs">Admin</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="flex flex-col items-center px-3 py-2 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition-all duration-200">
                                <i class="fas fa-sign-out-alt text-lg mb-1"></i>
                                <span class="text-xs">Keluar</span>
                            </button>
                        </form>
                    </div>
                    
                    <!-- Mobile Navigation -->
                    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-neutral-200 md:hidden z-50">
                        <div class="grid grid-cols-7 items-center py-2">
                            <a href="{{ route('dashboard') }}" class="flex flex-col items-center">
                                <i class="fas fa-th-large text-lg mb-1 {{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-neutral-400' }}"></i>
                                <span class="text-[10px] {{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-neutral-600' }}">Beranda</span>
                            </a>
                            <a href="{{ route('kategori.index') }}" class="flex flex-col items-center">
                                <i class="fas fa-tag text-lg mb-1 {{ request()->routeIs('kategori.*') ? 'text-primary-600' : 'text-neutral-400' }}"></i>
                                <span class="text-[10px] {{ request()->routeIs('kategori.*') ? 'text-primary-600' : 'text-neutral-600' }}">Kategori</span>
                            </a>
                            <a href="{{ route('petugas.index') }}" class="flex flex-col items-center">
                                <i class="fas fa-user-cog text-lg mb-1 {{ request()->routeIs('petugas.*') ? 'text-primary-600' : 'text-neutral-400' }}"></i>
                                <span class="text-[10px] {{ request()->routeIs('petugas.*') ? 'text-primary-600' : 'text-neutral-600' }}">Petugas</span>
                            </a>
                            <a href="{{ route('galeri.index') }}" class="flex flex-col items-center">
                                <i class="fas fa-images text-lg mb-1 {{ request()->routeIs('galeri.*') ? 'text-primary-600' : 'text-neutral-400' }}"></i>
                                <span class="text-[10px] {{ request()->routeIs('galeri.*') ? 'text-primary-600' : 'text-neutral-600' }}">Galeri</span>
                            </a>
                            <a href="{{ route('pages.index') }}" class="flex flex-col items-center">
                                <i class="fas fa-file-alt text-lg mb-1 {{ request()->routeIs('pages.*') ? 'text-primary-600' : 'text-neutral-400' }}"></i>
                                <span class="text-[10px] {{ request()->routeIs('pages.*') ? 'text-primary-600' : 'text-neutral-600' }}">Pages</span>
                            </a>
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex flex-col items-center focus:outline-none">
                                    <i class="fas fa-user text-lg mb-1" :class="{ 'text-primary-600': open, 'text-neutral-400': !open }"></i>
                                    <span class="text-[10px]" :class="{ 'text-primary-600': open, 'text-neutral-600': !open }">Admin</span>
                                </button>
                                
                                <!-- Dropdown menu -->
                                <div x-show="open" 
                                     @click.away="open = false"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute right-0 bottom-full mb-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1">
                                    <div class="px-4 py-2 border-b">
                                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                                @csrf
                                <button type="submit" class="flex flex-col items-center">
                                    <i class="fas fa-sign-out-alt text-lg mb-1 text-red-500"></i>
                                    <span class="text-[10px] text-red-600">Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-6 md:py-20 px-3 md:px-4 pb-20 md:pb-6"> <!-- Adjusted padding for mobile bottom nav -->
        <!-- Notification Center -->
        <div class="mb-6 space-y-2">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-soft">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span class="font-medium tracking-wide text-sm">{{ session('success') }}</span>
                </div>
            @endif
            
            <!-- System Notifications -->
            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg shadow-soft flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-bell mr-2"></i>
                    <span class="font-medium tracking-wide text-sm">5 foto baru menunggu verifikasi</span>
                </div>
                <button class="text-blue-600 hover:text-blue-700">
                    <i class="fas fa-arrow-right text-sm"></i>
                </button>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
            <div class="bg-white rounded-xl shadow-soft p-4 border border-neutral-100">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-primary-50 rounded-lg">
                        <i class="fas fa-image text-primary-600"></i>
                    </div>
                    <span class="text-xs text-neutral-500">Total Foto</span>
                </div>
                <div class="flex items-baseline space-x-1">
                    <span class="text-xl font-bold text-neutral-800">245</span>
                    <span class="text-xs text-green-600">+12%</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-soft p-4 border border-neutral-100">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-purple-50 rounded-lg">
                        <i class="fas fa-eye text-purple-600"></i>
                    </div>
                    <span class="text-xs text-neutral-500">Pengunjung</span>
                </div>
                <div class="flex items-baseline space-x-1">
                    <span class="text-xl font-bold text-neutral-800">1.2K</span>
                    <span class="text-xs text-green-600">+5%</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-soft p-4 border border-neutral-100">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-green-50 rounded-lg">
                        <i class="fas fa-folder text-green-600"></i>
                    </div>
                    <span class="text-xs text-neutral-500">Kategori</span>
                </div>
                <div class="flex items-baseline space-x-1">
                    <span class="text-xl font-bold text-neutral-800">12</span>
                    <span class="text-xs text-neutral-500">Aktif</span>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-soft p-4 border border-neutral-100">
                <div class="flex items-center justify-between mb-2">
                    <div class="p-2 bg-orange-50 rounded-lg">
                        <i class="fas fa-chart-bar text-orange-600"></i>
                    </div>
                    <span class="text-xs text-neutral-500">Popularitas</span>
                </div>
                <div class="flex items-baseline space-x-1">
                    <span class="text-xl font-bold text-neutral-800">98%</span>
                    <span class="text-xs text-green-600">+3%</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions for Mobile -->
        <div class="flex overflow-x-auto gap-2 mb-4 md:hidden -mx-3 px-3">
            <button class="flex items-center space-x-2 whitespace-nowrap px-3 py-2 rounded-lg bg-primary-50 text-primary-600 text-sm font-medium">
                <i class="fas fa-upload"></i>
                <span>Upload Foto</span>
            </button>
            <button class="flex items-center space-x-2 whitespace-nowrap px-3 py-2 rounded-lg bg-neutral-100 text-neutral-600 text-sm font-medium">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
            <button class="flex items-center space-x-2 whitespace-nowrap px-3 py-2 rounded-lg bg-neutral-100 text-neutral-600 text-sm font-medium">
                <i class="fas fa-sort"></i>
                <span>Urutkan</span>
            </button>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
            <!-- Galeri Card -->
            <div class="bg-white rounded-xl shadow-card p-4 md:p-6 border border-neutral-100">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-primary-50 rounded-lg">
                            <i class="fas fa-image text-primary-600 text-lg"></i>
                        </div>
                        <h3 class="text-base md:text-lg font-display font-semibold text-neutral-800">Galeri Foto</h3>
                    </div>
                    <button class="hidden md:inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition-all duration-200">
                        <i class="fas fa-upload text-sm"></i>
                    </button>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-3">
                    <div class="aspect-square bg-neutral-100 rounded-lg flex items-center justify-center touch-manipulation">
                        <i class="fas fa-image text-neutral-300"></i>
                    </div>
                    <div class="aspect-square bg-neutral-100 rounded-lg flex items-center justify-center touch-manipulation">
                        <i class="fas fa-image text-neutral-300"></i>
                    </div>
                    <div class="aspect-square bg-neutral-100 rounded-lg flex items-center justify-center touch-manipulation">
                        <i class="fas fa-image text-neutral-300"></i>
                    </div>
                    <div class="aspect-square bg-neutral-100 rounded-lg flex items-center justify-center touch-manipulation">
                        <i class="fas fa-plus text-neutral-300"></i>
                    </div>
                </div>
                <p class="text-[11px] md:text-xs text-neutral-500">4 foto terbaru ditampilkan</p>
            </div>

            <!-- Info Terkini Card -->
            <div class="bg-white rounded-xl shadow-card p-6 border border-neutral-100">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <i class="fas fa-bell text-blue-600 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-display font-semibold text-neutral-800">Informasi</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-neutral-50 transition-all duration-200">
                        <i class="fas fa-circle-info text-blue-500 text-sm"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-800">Update sistem galeri terbaru</p>
                            <p class="text-xs text-neutral-500">2 jam yang lalu</p>
                        </div>
                        <i class="fas fa-chevron-right text-neutral-300 text-xs"></i>
                    </div>
                    <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-neutral-50 transition-all duration-200">
                        <i class="fas fa-tag text-blue-500 text-sm"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-800">Kategori baru ditambahkan</p>
                            <p class="text-xs text-neutral-500">5 jam yang lalu</p>
                        </div>
                        <i class="fas fa-chevron-right text-neutral-300 text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Card -->
            <div class="bg-white rounded-xl shadow-card p-6 border border-neutral-100">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-green-50 rounded-lg">
                        <i class="fas fa-calendar-check text-green-600 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-display font-semibold text-neutral-800">Agenda</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-neutral-50 transition-all duration-200">
                        <i class="fas fa-graduation-cap text-green-500 text-sm"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-800">Wisuda Angkatan 2025</p>
                            <p class="text-xs text-neutral-500">28 Agustus 2025</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium text-green-600 bg-green-50 rounded-full">Segera</span>
                    </div>
                    <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-neutral-50 transition-all duration-200">
                        <i class="fas fa-trophy text-green-500 text-sm"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-neutral-800">Kompetisi Sains</p>
                            <p class="text-xs text-neutral-500">1 September 2025</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium text-neutral-600 bg-neutral-100 rounded-full">Mendatang</span>
                    </div>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="mb-4 bg-red-50 border-2 border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-sm">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span class="font-medium tracking-wide">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
