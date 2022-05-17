<?php

namespace App\View\Components;

use App\Models\ActiveLink;
use App\Models\Social;
use Illuminate\View\Component;

class FooterComponenet extends Component
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
        $socials = Social::all();
        $active_links = ActiveLink::where('active',1)->get();
        $footer_usefull_links = $active_links->whereIn('appear_on',['navbar_footer_usefull','footer_usefull_only'])->where('active',1);
        $footer_helper_links = $active_links->whereIn('appear_on',['navbar_footer_helper','footer_helpers_only'])->where('active',1);
        return view('components.footer-componenet',[
            'socials' => $socials,
            'footer_usefull_links' => $footer_usefull_links,
            'footer_helper_links' => $footer_helper_links
        ]);
    }
}
