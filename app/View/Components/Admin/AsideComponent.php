<?php

namespace App\View\Components\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AsideComponent extends Component
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
        $groups = DB::table('routes')->groupBy('group')->pluck('group')->toArray();
        $menus = [];

        foreach( $groups as $group ) {

            $menus[$group] = DB::table('routes')->where('group',$group)->get()->toArray();

        }
        
        return view('components.Admin.aside-component',[
            'menus' => $menus
        ]);
    }
}
