<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Interfaces\ProjectEloquentInterface;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * @var ProjectEloquentInterface
     */
    protected $projects;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectEloquentInterface $projects
     */
    public function __construct(ProjectEloquentInterface $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->projects->find($id, ['assets']);

        return response()->json([
            'project' => new ProjectResource($project)
        ]);
    }
}
