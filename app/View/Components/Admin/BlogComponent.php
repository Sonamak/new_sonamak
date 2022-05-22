<?php

namespace App\View\Components\admin;

use App\Models\Banners;
use App\Models\Blog;
use Illuminate\View\Component;

class BlogComponent extends Component
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
        $banner = Banners::where('type','blog')->first();

        return view('components.Admin.blog-component',[
            'banner' => $banner 
        ]);
    }
}
