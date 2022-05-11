<?php

namespace App\View\Components;

use App\Models\Tour;
use Illuminate\View\Component;

class TourSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $feature;

    public function __construct($feature = false)
    {
        $this->feature = $feature;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $feature = $this->feature;
        $tours = Tour::where(function($query) use ($feature) {

            if ( $feature ) {
                $query->where('feature',$feature);
            }

        })->with('packages')->get();


        
        return view('components.tour-slider',[
            'tours' => $tours
        ]);
    }
}
