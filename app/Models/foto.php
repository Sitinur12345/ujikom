<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $table = 'foto';
    public $timestamps = true;
    
    protected $fillable = [
        'galery_id', 'file'
    ];

    public function galery()
    {
        return $this->belongsTo(galery::class, 'galery_id');
    }
    
    public function downloadLogs()
    {
        return $this->hasMany(DownloadLog::class, 'foto_id');
    }
}
