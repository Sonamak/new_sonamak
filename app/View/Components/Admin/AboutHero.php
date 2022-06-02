<?php

namespace App\View\Components\Admin;

use App\Models\Banner;
use Illuminate\View\Component;

class AboutHero extends Component
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
        $banner = Banner::where('type','about')->first();

        return view('components.Admin.about-hero',[
            'banner' => $banner
        ]);
    }
}
