<?php

namespace App\View\Components;

use App\Models\Destination;
use Illuminate\View\Component;

class DestinationSlider extends Component
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
        $destinations = Destination::all();
        return view('components.destination-slider',[
            'destinations' => $destinations
        ]);
    }
}
