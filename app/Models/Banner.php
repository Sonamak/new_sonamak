<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use App\Http\Services\ImageService;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory,ImageService,ValidationService,ImageService;
    
    protected $fillable = [
            'id',
            'header_text',
            'lower_text',
            'btn_text',
            'type'
        ];

    protected $root = 'storage/banner';

    static function storeBanner($request)
    {
        $banner = self::updateOrCreate(
            ['type' => $request->type ],
            $request->all()
        );
        
       if ( $request->background ) {

            if ( $banner->background ) {
                $banner->deleteImagesWithIdsBelongsToRelation([$banner->background->id],'storage/banner','gallaries');
            }

            $banner->dimintions(['large' => '1865x844'])
            ->resize()
            ->files($request->background)
            ->withSaveRelation('gallaries')
            ->usefor('background')
            ->compile();
        }

        if ( $request->hero ) {

            if ( $banner->background ) {
                $banner->deleteImagesWithIdsBelongsToRelation([$banner->background->id],'storage/banner','gallaries');
            }

            $banner->dimintions(['large' => '494x224'])
            ->resize()
            ->files($request->hero)
            ->withSaveRelation('gallaries')
            ->usefor('background')
            ->compile();
        }
    }
    
    public function getBackgroundAttribute()
    {
        return $this->gallaries()->where('use_for','background')->first();
    }

    // Relations

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }


}