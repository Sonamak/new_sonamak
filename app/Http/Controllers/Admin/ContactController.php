<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactname;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller {

    public function index(Request $request)
    {
        return view('admin.contact.index',[
            'contacts' => Contact::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Contact $contact)
    {
        return  view('admin.contact.upsert',[
            'contact' => $contact ?? null
        ]);
    }

    public function store(ContactRequest $request )
    {
        Contact::upsertInstance($request);
    }

    public function delete(Contact $contact)
    {
        return $contact->deleteInstance();
    }

    public function get(Contact $contact)
    {
        return $contact;
    }

}

