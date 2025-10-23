<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GalleryInteractionController extends Controller
{
    public function comment(Request $request, \App\Models\post $post)
    {
        $request->validate([
            'comment' => ['required', 'string', 'max:500'],
        ]);
        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('comment'),
        ]);
        return back()->with('status', 'commented');
    }

    public function download(\App\Models\foto $foto)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu untuk mengunduh foto.');
        }

        $filename = $foto->file;
        $path = 'uploads/galeri/' . $filename;
        
        // Cek file di storage public
        if (Storage::disk('public')->exists($path)) {
            $filepath = storage_path('app/public/' . $path);
            $headers = [
                'Content-Type' => 'image/jpeg',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            // Log download activity
            \App\Models\DownloadLog::create([
                'user_id' => auth()->id(),
                'foto_id' => $foto->id,
                'downloaded_at' => now(),
            ]);
            
            return response()->download($filepath, $filename, $headers);
        }
        
        // Jika tidak ada di storage, coba di public path
        $publicPath = public_path($path);
        if (file_exists($publicPath)) {
            // Log download activity
            \App\Models\DownloadLog::create([
                'user_id' => auth()->id(),
                'foto_id' => $foto->id,
                'downloaded_at' => now(),
            ]);
            
            return response()->download($publicPath, $filename);
        }
        
        // Jika file tidak ditemukan
        return back()->with('error', 'File tidak ditemukan');
    }
}


