<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class RecentBlog extends Component
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
        $blog = Blog::orderBy('created_at')->withLanguage()->take(4)->get();
        return view('components.recent-blog',[
            'blogs' => $blog
        ]);
    }
}
