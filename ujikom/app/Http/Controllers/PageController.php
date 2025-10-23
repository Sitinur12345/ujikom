<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::ordered()->get();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'status' => 'required|in:published,draft',
            'template' => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug jika tidak diisi
        $slug = $request->slug ?: Str::slug($request->title);
        
        // Pastikan slug unique
        $originalSlug = $slug;
        $counter = 1;
        while (Page::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $page = Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'template' => $request->template,
            'sort_order' => $request->sort_order ?? 0,
            'meta_data' => [
                'meta_title' => $request->meta_title ?? $request->title,
                'meta_description' => $request->meta_description ?? $request->excerpt,
                'meta_keywords' => $request->meta_keywords,
            ]
        ]);

        return redirect()->route('pages.index')->with('success', 'Halaman berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        // Untuk public view (frontend)
        if (!$page->isPublished()) {
            abort(404);
        }
        
        return view('pages.show', compact('page'));
    }
    
    /**
     * Show page by slug (untuk frontend)
     */
    public function showBySlug($slug)
    {
        $page = Page::where('slug', $slug)->published()->firstOrFail();
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'status' => 'required|in:published,draft',
            'template' => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug jika tidak diisi
        $slug = $request->slug ?: Str::slug($request->title);
        
        // Pastikan slug unique (kecuali untuk page ini sendiri)
        if ($slug !== $page->slug) {
            $originalSlug = $slug;
            $counter = 1;
            while (Page::where('slug', $slug)->where('id', '!=', $page->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $page->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'template' => $request->template,
            'sort_order' => $request->sort_order ?? 0,
            'meta_data' => [
                'meta_title' => $request->meta_title ?? $request->title,
                'meta_description' => $request->meta_description ?? $request->excerpt,
                'meta_keywords' => $request->meta_keywords,
            ]
        ]);

        return redirect()->route('pages.index')->with('success', 'Halaman berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Halaman berhasil dihapus!');
    }
    
    /**
     * Toggle status (published/draft)
     */
    public function toggleStatus(Page $page)
    {
        $page->status = $page->status === 'published' ? 'draft' : 'published';
        $page->save();
        
        return response()->json([
            'success' => true,
            'status' => $page->status,
            'message' => 'Status berhasil diubah ke ' . $page->status
        ]);
    }
}
