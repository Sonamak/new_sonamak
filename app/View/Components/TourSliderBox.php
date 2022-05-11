<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TourSliderBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $tour;
    public function __construct($tour)
    {
        $this->tour = $tour;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tour-slider-box',[
            'tour' => $this->tour
        ]);
    }
}
