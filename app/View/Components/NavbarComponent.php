<?php

namespace App\View\Components;

use App\Models\ActiveLink;
use Illuminate\View\Component;

class NavbarComponent extends Component
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
        $active_links = ActiveLink::where('active',1)->get();
        $navbar_links = $active_links->whereIn('appear_on',['navbar_footer_usefull','navbar_footer_helper','navbar only'])->where('active',1);
        return view('components.navbar-component',[
            'navbar_links' => $navbar_links
        ]);
    }
}
