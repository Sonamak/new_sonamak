<?php

namespace App\View\Components\Admin;

use App\Models\Banners;
use Illuminate\View\Component;

class DestiantionVideo extends Component
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
        return view('components.admin.destiantion-video',[
            'banner' => $banner
        ]);
    }
}
