<?php

namespace App\View\Components\front;

use App\Models\Statical;
use Illuminate\View\Component;

class staticalComponent extends Component
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
        $statical = Statical::take(3)->get();
        return view('components.front.statical-component',[
            'staticals' => $statical
        ]);
    }
}
