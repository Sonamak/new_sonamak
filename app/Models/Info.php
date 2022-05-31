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

    static function upsertInstance($request)
    {
        $info = self::updateOrCreate(
            [
                'type' => $request->type
            ],
            [
                'type' => $request->type,
                'value' => $request->value
            ]
        );

        if ($request->extra) {
            $extra = collect($request->extra)->map(function($item) use ($info){
                $item['info_id'] = $info->id;
                return $item;
            })->all();

            // dd($includes);

            $info->extra()->upsert(
                $extra,
                ['id'],
                ['type','value']
            );

        }

        return $info->result('success',$info);
    }

    public function extra()
    {
        return $this->hasMany(Extra::class);
    }
}
