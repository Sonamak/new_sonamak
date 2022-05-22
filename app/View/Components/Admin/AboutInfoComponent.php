<?php

namespace App\View\Components\Admin;

use App\Models\Info;
use Illuminate\View\Component;

class AboutInfoComponent extends Component
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
        $info = Info::where('type','about')->first();
        return view('components.Admin.about-info-component',[
            'info' => $info
        ]);
    }
}
