<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug', 
        'content',
        'excerpt',
        'status',
        'template',
        'meta_data',
        'sort_order'
    ];
    
    protected $casts = [
        'meta_data' => 'array'
    ];
    
    // Auto generate slug dari title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        
        // Generate slug otomatis jika belum ada
        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
    
    // Helper untuk cek status published
    public function isPublished()
    {
        return $this->status === 'published';
    }
    
    // Helper untuk get URL
    public function getUrlAttribute()
    {
        return route('page.show', $this->slug);
    }
    
    // Scope untuk published pages
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
    
    // Scope untuk ordered by sort_order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('title', 'asc');
    }
}
