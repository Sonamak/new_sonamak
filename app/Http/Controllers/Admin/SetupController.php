<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{

    public function index() {
        return view('setup.index');
    }
    
    public function storeSetup(Request $request)
    {
        return Setup::storeSetup($request);
    }
}
