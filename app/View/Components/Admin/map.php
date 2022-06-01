<?php

namespace App\View\Components\admin;

use App\Models\Banner;
use Illuminate\View\Component;

class map extends Component
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
        return view('components.Admin.map',[
            'banner' => $banner
        ]);
    }
}
