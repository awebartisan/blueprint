<?php

namespace App\Repositories;

use App\Interfaces\AssetEloquentInterface;
use App\Models\Asset;

class AssetEloquentRepository extends BaseEloquentRepository implements AssetEloquentInterface
{
    protected $modelName = Asset::class;
}
