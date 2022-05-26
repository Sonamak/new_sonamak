<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testname;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Http\Requests\TestRequest;


class TestController extends Controller {

    public function index(Request $request)
    {
        return view('admin.test.index',[
            'tests' => Test::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Test $test)
    {
        return  view('admin.test.upsert',[
            'test' => $test ?? null
        ]);
    }

    public function store(TestRequest $request )
    {
        Test::upsertInstance($request);
    }

    public function delete(Test $test)
    {
        return $test->deleteInstance();
    }

    public function get(Test $test)
    {
        return $test;
    }

}

