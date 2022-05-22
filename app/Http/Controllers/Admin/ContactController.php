<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index',[
            'contacts' => ContactUs::paginate(5)
        ]);
    }

    public function create(ContactUsRequest $request)
    {
        ContactUs::createInstance($request);
    }
}
