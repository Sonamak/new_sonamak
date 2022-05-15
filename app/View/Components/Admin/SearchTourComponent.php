<?php

namespace App\View\Components\admin;

use App\Models\Banners;
use Illuminate\View\Component;

class SearchTourComponent extends Component
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
        $info = Banners::where('type','search-tour')->first();
        return view('components.admin.search-tour-component',[
            'banner' => $info
        ]);
    }
}
