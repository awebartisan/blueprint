<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Asset extends BaseModel
{
    protected $fillable = [
        'path',
        'project_id',
    ];

    /*
    * Accessors
    */

    public function getDownloadUrlAttribute()
    {
        return url(Storage::url($this->path));
    }
}
