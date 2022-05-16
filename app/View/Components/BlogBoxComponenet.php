<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class BlogBoxComponenet extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blog;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-box-componenet',[
            'blog' => $this->blog
        ]);
    }
}
