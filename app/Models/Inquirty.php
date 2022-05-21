<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquirty extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','telephone','department','return','language','nationality','inquiry'];

    static function createInstance($request)
    {
        $inquiry = self::create(
            $request->all()
        );

        return $inquiry;
    }
}
