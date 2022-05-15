<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Tour;
use Livewire\Component;

class TourSearch extends Component
{
    public $count = 10;
    public $tours;


    public function mount() 
    {
        $this->tours = Tour::take(10)->get();
    }

    public function loadMore()
    {
        $this->count += 10;

        $tour = Tour::paginate($this->count);

        dd($tour);
    }

    public function render()
    {
        return view('livewire.tour-search',[
            'tours' => $this->tours,
            'categories' => Category::all()
        ]);
    }
}
