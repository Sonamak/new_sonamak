<?php

namespace App\View\Components\admin;

use App\Models\Banner;
use Illuminate\View\Component;

class MapComponent extends Component
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
        $banner = Banner::where('type','map')->first();
        dd('asd');
        return view('components.Admin.map-component',[
            'banner' => $banner
        ]);
    }
}
