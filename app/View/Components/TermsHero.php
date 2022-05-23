<?php

namespace App\View\Components;

use App\Models\Banners;
use Illuminate\View\Component;

class TermsHero extends Component
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
        $banner = Banners::where('type','terms')->first();
        return view('components.terms-hero',[
            'banner' => $banner
        ]);
    }
}
