<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    protected $table = 'galery';
    public $timestamps = false;
    
    protected $fillable = [
        'post_id', 'position', 'status'
    ];

    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id');
    }

    public function fotos()
    {
        return $this->hasMany(foto::class, 'galery_id');
    }
    
    // Helper untuk mengakses kategori melalui post
    public function kategori()
    {
        return $this->hasOneThrough(Kategori::class, posts::class, 'id', 'id', 'post_id', 'kategori_id');
    }
}
