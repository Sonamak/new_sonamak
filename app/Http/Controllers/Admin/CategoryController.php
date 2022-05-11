<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index',[
            'categorys' => Category::all()
        ]);
    }


    public function create(CategoryRequest $request)
    {

        return Category::createInstance($request);

    }

    public function delete(Category $category)
    {
        return $category->deleteInstance();
    }
}
