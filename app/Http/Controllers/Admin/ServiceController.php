<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicename;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;


class ServiceController extends Controller {

    public function index(Request $request)
    {
        return view('admin.service.index',[
            'services' => Service::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Service $service)
    {
        return  view('admin.service.upsert',[
            'service' => $service ?? null
        ]);
    }

    public function store(ServiceRequest $request )
    {
        Service::upsertInstance($request);
    }

    public function delete(Service $service)
    {
        return $service->deleteInstance();
    }

    public function get(Service $service)
    {
        return $service;
    }

}

