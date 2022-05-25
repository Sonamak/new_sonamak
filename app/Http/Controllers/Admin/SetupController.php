<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetupRequest;
use App\Models\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{

    public function index() {
        return view('admin.setup.index');
    }

    public function store(SetupRequest $request)
    {
        return Setup::store($request);
    }
}