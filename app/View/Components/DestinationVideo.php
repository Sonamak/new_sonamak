<?php

namespace App\View\Components;

use App\Models\Banners;
use Illuminate\View\Component;

class DestinationVideo extends Component
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
        $banner = Banners::where('type','video')->first();
        return view('components.destination-video',[
            'banner' => $banner
        ]);
    }
}
