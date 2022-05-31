<?php

namespace App\View\Components\front;

use App\Models\Banner;
use Illuminate\View\Component;

class MySliderComponent extends Component
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
        $banner = Banner::where('type','hero')->first();
        return view('components.front.my-slider-component',[
            'banner' => $banner
        ]);
    }
}
