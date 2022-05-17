<?php

namespace App\View\Components;

use App\Models\Destination;
use Illuminate\View\Component;

class DestinationLargeBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $destination;

    public function __construct(Destination $destination)
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
        return view('components.destination-large-box',[
            'destination' => $this->destination
        ]);
    }
}
