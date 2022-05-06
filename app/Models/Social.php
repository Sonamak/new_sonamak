<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory,ValidationService;

    protected $guarded = [];

    public function createInstance($request)
    {
        $social = self::create(
            [
                'type' => $request->type,
                'value' => $request->value
            ]
        );

        return $social;
    }

    public function deleteInstance()
    {
        $this->delete();
        return $this->result('success',$this);
    }
}
