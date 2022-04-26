<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TourForm extends Component
{

    public $title_en;
    public $title_fr;
    public $description_en;
    public $description_fr;

    public $rules = [
        'title_en' => 'required',
        'title_fr' => 'required',
        'description_en' => 'required',
        'description_fr' => 'required'
    ];

    public function submitTour()
    {
        dd($this->all());
    }

    public function render()
    {
        return view('livewire.admin.tour-form');
    }
}
