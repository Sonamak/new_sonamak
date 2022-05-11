<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory,ValidationService;

    protected $guarded = [];

    static function store($request)
    {
        $info = self::updateOrCreate(
            ['type' => $request->type],
            [
                'type' => $request->type,
                'value_en' => $request->value_en,
                'value_fr' => $request->value_fr
            ]
        );

        return (new self)->result('success',$info);
    }

}
