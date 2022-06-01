<?php

namespace App\View\Components\front;

use App\Models\Banner;
use App\Models\Social;
use Illuminate\View\Component;

class ContactUs extends Component
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
        $banner = Banner::where('type','contact')->get();
        return view('components.Front.contact-us',[
            'socials' => Social::whereIn('type',['phone','location','email','whatsapp'])->get(),
            'banner' => $banner
        ]);
    }
}
