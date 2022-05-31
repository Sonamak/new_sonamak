<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnername;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests\PartnerRequest;


class PartnerController extends Controller {

    public function index(Request $request)
    {
        return view('admin.partner.index',[
            'partners' => Partner::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Partner $partner)
    {
        return  view('admin.partner.upsert',[
            'partner' => $partner ?? null
        ]);
    }

    public function store(PartnerRequest $request )
    {
        Partner::upsertInstance($request);
    }

    public function delete(Partner $partner)
    {
        return $partner->deleteInstance();
    }

    public function get(Partner $partner)
    {
        return $partner;
    }

}

