<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projectname;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Models\Coder;
use App\Models\Service;

class ProjectController extends Controller {

    public function index(Request $request)
    {
        return view('admin.project.index',[
            'projects' => Project::filter($request)->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function upsert(Project $project)
    {
        return  view('admin.project.upsert',[
            'project' => $project ?? null,
            'coders'  => Coder::all(),
            'services' => Service::all(),
        ]);
    }

    public function store(ProjectRequest $request )
    {
        Project::upsertInstance($request);
    }

    public function delete(Project $project)
    {
        return $project->deleteInstance();
    }

    public function get(Project $project)
    {
        return $project;
    }

    public function toggleFeature(Project $project)
    {
        $project->toggleFeature();
    }

}

