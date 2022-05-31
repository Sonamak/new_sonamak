<?php

namespace App\View\Components\front;

use App\Models\Project;
use Illuminate\View\Component;

class OurProject extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $projects = Project::where('feature',true)->get();
        return view('components.front.our-project',[
            'projects' => $projects
        ]);
    }
}
