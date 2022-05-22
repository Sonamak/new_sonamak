<?php

namespace App\View\Components;

use App\Models\Banners;
use App\Models\Social;
use Illuminate\View\Component;

class ContactHero extends Component
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
        $banner = Banners::where('type','contact_page')->first();
        $contact = Social::whereIn('type',['location','phone','email'])->get();

        return view('components.contact-hero',[
            'banner' => $banner,
            'contact' => $contact
        ]);
    }
}
