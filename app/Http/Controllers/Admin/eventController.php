<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eventname;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\EventRequest;


class eventController extends Controller {

    public function index(Request $request)
    {
        return view('admin.event.index',[
            'events' => Event::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Event $event)
    {
        return  view('admin.modlower.upsert',[
            'event' => $event ?? null
        ]);
    }

    public function store(EventRequest $request )
    {
        Event::upsertInstance($request);
    }

    public function delete(Event $event)
    {
        $event->deleteInstance();
    }

    public function get(Event $event)
    {
        return $event;
    }

}

