<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    protected $fillable = [
        'user_id',
        'foto_id',
        'downloaded_at'
    ];

    protected $dates = [
        'downloaded_at',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
}
