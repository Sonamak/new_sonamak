<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slidername;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;


class SliderController extends Controller {

    public function index(Request $request)
    {
        return view('admin.slider.index',[
            'sliders' => Slider::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Slider $slider)
    {
        return  view('admin.slider.upsert',[
            'slider' => $slider ?? null
        ]);
    }

    public function store(SliderRequest $request )
    {
        Slider::upsertInstance($request);
    }

    public function delete(Slider $slider)
    {
        return $slider->deleteInstance();
    }

    public function get(Slider $slider)
    {
        return $slider;
    }

}

