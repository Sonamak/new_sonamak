<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function createInstance($request)
    {
        dd('here');
        self::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'message' => $request->message
        ]);
    }
}
