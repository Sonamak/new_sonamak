<?php

namespace App\View\Components\admin;

use App\Models\Extra;
use App\Models\Info;
use Illuminate\View\Component;

class AboutBanner extends Component
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
        return view('components.admin.about-banner',[
            'extras' => Extra::where('type','about')->get(),
            'info' => Info::where('type','about')->first()
        ]);
    }
}
