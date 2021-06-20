<?php

namespace App\Http\Controllers;

use App\Interfaces\AssetEloquentInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProjectsAssetsController extends Controller
{
    /**
     * @var AssetEloquentInterface
     */
    protected $assets;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectEloquentInterface $projects
     */
    public function __construct(AssetEloquentInterface $assets)
    {
        $this->assets = $assets;
    }

    public function index()
    {
        $assets = $this->assets->paginate('created_at')
            ->map(function ($asset) {
                return (object)[
                    'id' => $asset->id,
                    'path' => $asset->path,
                    'size' => Storage::size($asset->path),
                    'download_url' => $asset->download_url,
                    'mimeType' => Storage::mimeType($asset->path),
                    'lastModified' => Carbon::createFromTimestampUTC(
                        Storage::lastModified($asset->path)
                    )->diffForHumans(),
                ];
            });

        return view('projects.assets.index', compact('assets'));
    }
}
