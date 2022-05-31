<?php

namespace App\View\Components\front;

use App\Models\Badget;
use App\Models\Social;
use Illuminate\View\Component;

class FooterComponent extends Component
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
        
        return view('components.front.footer-component', [
            'clush' => Badget::where('type','clush')->first(),
            'contacts' => Social::whereIn('type',['phone','location','email','whatsapp'])->get(),
        ]);
    }
}
