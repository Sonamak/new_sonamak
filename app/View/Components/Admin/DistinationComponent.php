<?php

namespace App\View\Components\admin;

use App\Models\Banners;
use Illuminate\View\Component;

class DistinationComponent extends Component
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
        $banner = Banners::where('type','distination')->first();

        return view('components.Admin.distination-component',[
            'banner' => $banner
        ]);
    }
}
