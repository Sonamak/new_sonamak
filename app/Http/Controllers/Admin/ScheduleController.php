<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;


class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedule.index',[
            'schedule' => Schedule::all()
        ]);
    }

    public function create(ScheduleRequest $request)
    {
        Schedule::upsertInstance($request);
    }
}
