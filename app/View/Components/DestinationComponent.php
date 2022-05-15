<?php

namespace App\View\Components;

use App\Models\Destination;
use Illuminate\View\Component;

class DestinationComponent extends Component
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
        $destinations = Destination::where('popular',1)->take(4)->get();
        return view('components.destination-component',[
            'destinations' => $destinations
        ]);
    }
}
