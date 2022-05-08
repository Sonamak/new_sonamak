<?php

namespace App\View\Components\Admin;

use App\Models\Info;
use Illuminate\View\Component;

class FaqComponent extends Component
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
        $info = Info::where('type','faq')->first();

        return view('components.admin.faq-component',[
            'info' => $info
        ]);
    }
}
