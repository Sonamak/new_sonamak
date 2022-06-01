<?php

namespace App\View\Components\front;

use App\Models\Partner;
use Illuminate\View\Component;

class PartnerComponent extends Component
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
        $partner = Partner::all();
        return view('components.Front.partner-component',[
            'partners' => $partner
        ]);
    }
}
