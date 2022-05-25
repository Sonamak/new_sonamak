<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function createInstance($model,$request,$type)
    {
        $model->seo()->where('type',$type)->delete();
        $request = json_decode($request,true);

        $request = array_map(function($row) use ($type) {
            return $row + ['type' => $type];
        }, $request);

        $model->seo()->createMany($request);
    }
}
