<?php

namespace App\Http\Controllers;

use App\Models\galery;
use App\Models\Kategori;
use App\Models\Petugas;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get real statistics
        $totalGaleri = galery::count();
        $galeriAktif = galery::where('status', 'aktif')->count();
        $totalKategori = Kategori::count();
        $totalPetugas = Petugas::count();
        $totalPages = Page::count();
        $totalUsers = User::count();
        
        // Get recent galeri (last 5) - order by posts created_at
        $recentGaleri = galery::with(['post.kategori', 'fotos'])
            ->join('posts', 'galery.post_id', '=', 'posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->select('galery.*')
            ->limit(5)
            ->get();
        
        // Get galeri pending approval (if any) - order by posts created_at
        $pendingGaleri = galery::where('galery.status', 'nonaktif')
            ->with(['post.kategori', 'fotos'])
            ->join('posts', 'galery.post_id', '=', 'posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->select('galery.*')
            ->limit(5)
            ->get();
        
        // Get recent activities (last 10)
        $recentActivities = collect();
        
        // Add recent galeri as activities
        foreach ($recentGaleri as $galeri) {
            $recentActivities->push([
                'type' => 'galeri',
                'title' => $galeri->post->judul ?? 'Galeri tanpa judul',
                'description' => 'Galeri baru ditambahkan',
                'time' => $galeri->post->created_at ?? now(),
                'icon' => 'fas fa-images',
                'color' => 'text-blue-600'
            ]);
        }
        
        // Sort by time
        $recentActivities = $recentActivities->sortByDesc('time')->take(10);
        
        // Calculate growth (mock data for now)
        $galeriGrowth = $totalGaleri > 0 ? '+12%' : '0%';
        $visitorGrowth = '+5%';
        $categoryGrowth = '+8%';
        $pageGrowth = '+3%';
        
        return view('dashboard', compact(
            'totalGaleri',
            'galeriAktif',
            'totalKategori',
            'totalPetugas',
            'totalPages',
            'totalUsers',
            'recentGaleri',
            'pendingGaleri',
            'recentActivities',
            'galeriGrowth',
            'visitorGrowth',
            'categoryGrowth',
            'pageGrowth'
        ));
    }
}
