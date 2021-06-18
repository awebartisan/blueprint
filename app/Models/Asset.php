<?php

namespace App\Models;

class Asset extends BaseModel
{
    protected $fillable = [
        'path',
        'project_id',
    ];
}
