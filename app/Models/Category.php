<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function createInstance($request)
    {
        $category = self::create(
            [
                'name_en' => $request->name_en,
                'name_fr' => $request->name_fr,
                'type' => $request->type
            ]
        );

        return $category;
    }

    public function deleteInstance()
    {
        $this->delete();
        return $this->result('success',$this);
    }
}
