<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutname;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\AboutRequest;


class aboutController extends Controller {

    public function index(Request $request)
    {
        return view('admin.about.index',[
            'abouts' => About::filter($request)->paginate(10)
        ]);
    }

    public function upsert(About $about)
    {
        return  view('admin.modlower.upsert',[
            'about' => $about ?? null
        ]);
    }

    public function store(AboutRequest $request )
    {
        About::upsertInstance($request);
    }

    public function delete(About $about)
    {
        $about->deleteInstance();
    }

    public function get(About $about)
    {
        return $about;
    }

}

