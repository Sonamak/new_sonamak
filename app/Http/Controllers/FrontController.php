<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function project()
    {
        return view('front.projects.index',[
            'projects' => Project::all(),
            'services' => Service::all()
        ]);
    }

    public function singleProject(Project $project)
    {
        return view('front.projects.single',[
            'project' => $project
        ]);
    }

    public function home()
    {
        return view('front.home');
    }
}
