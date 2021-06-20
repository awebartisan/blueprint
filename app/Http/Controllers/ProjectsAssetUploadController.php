<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectAssetUploadRequest;
use App\Interfaces\ProjectEloquentInterface;
use App\Interfaces\AssetEloquentInterface;
use Illuminate\Http\RedirectResponse;

class ProjectsAssetUploadController extends Controller
{

    /**
     * @var ProjectEloquentInterface
     */
    protected $projects;

    /**
     * @var AssetEloquentInterface
     */
    protected $assets;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectEloquentInterface $projects
     */
    public function __construct(ProjectEloquentInterface $projects, AssetEloquentInterface $assets)
    {
        $this->assets = $assets;
        $this->projects = $projects;
    }
    /**
     * Upload the file and attach it to Project model.
     *
     * @param ProjectAssetUploadRequest $request
     * @param $id
     * @return RedirectResponse
     */

    public function store(ProjectAssetUploadRequest $request, $id)
    {
        $project = $this->projects->find($id);

        $path = $request->file('asset')->store('projects');

        $this->assets->store([
            'path' => $path,
            'project_id' => $project->id
        ]);

        return redirect()->back()->with('status', 'Asset uploaded successfully');
    }
}
