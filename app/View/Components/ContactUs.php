<?php

namespace App\View\Components;

use App\Models\Banners;
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
        $contact = Banners::where('type','contact')->first();
        return view('components.contact-us',[
            'banner' => $contact
        ]);
    }
}
