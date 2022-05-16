<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DestinationBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $destination;
    public function __construct($destination)
    {
        $this->destination = $destination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.destination-box',[
            'destination' => $this->destination
        ]);
    }
}
