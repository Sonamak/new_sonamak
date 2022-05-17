<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryBlog extends Component
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
        $categories = Category::where('type','blog_type')->withCount('blogs')->get();
        return view('components.category-blog',[
            'categories' => $categories
        ]);
    }
}
