<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Badget;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Extra;
use App\Models\Info;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Social;
use App\Models\Statical;
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
        return view('front.home',[
            'projects' => Project::where('feature',true)->get(),
            'banner' => Banner::where('type','hero')->first(),
            'map' => Banner::where('type','map')->first(),
            'staticals' => Statical::take(3)->get(),
            'partners' => Partner::all(),
            'contacts' => Social::whereIn('type',['phone','location','email','whatsapp'])->get(),
        ]);
    }

    public function contact()
    {
        return view('front.contact.index');
    }

    public function about()
    {
        return view('front.about.index',[
            'description' => Info::where('type','about')->first(),
            'extras' => Extra::where('type','about')->get(),
            'badgets' => Badget::where('type','!=','clush')->get(),
            'banner' => Banner::where('type','about')->first()
        ]);
    }
}
