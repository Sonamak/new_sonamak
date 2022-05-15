<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\View\Component;

class DestinationSearchComponent extends Component
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
        $tours = Tour::where('destination_id',$this->destination)->filter(request())->paginate(5);
        $categories = Category::all();
        return view('components.destination-search-component',[
            'destination' => $this->destination,
            'categories' => $categories,
            'tours' => $tours
        ]);
    }
}
