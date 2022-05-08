<?php

namespace App\View\Components\admin;

use App\Models\Banners;
use Illuminate\View\Component;

class ContactComponent extends Component
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
        $banner = Banners::where('type','contact')->first();

        return view('components.admin.contact-component',[
            'banner' => $banner
        ]);
    }
}