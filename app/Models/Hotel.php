<?php

namespace App\Models;

use App\Http\Services\ImageService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;

class Hotel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService,ImageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'description_en',
        'description_fr',
        'price_id',
        'title_en',
        'title_fr'
    ];

    protected $root = 'storage/hotel';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    {
        $hotel = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if (  $hotel->thumbnail && $request->thumbnail) {

            $hotel->deleteImagesWithIdsBelongsToRelation([$hotel->thumbnail->id],'storage/hotel','gallaries');

        }

        if ( $request->thumbnail ) {
            $hotel->dimintions(['large' => '1602x1067','small' => '261x164'])
                ->resize()
                ->files($request->thumbnail)
                ->withSaveRelation('gallaries')
                ->usefor('thumbnail')
                ->compile();
        }

        return (new self)->result($hotel,'success');
    }

    public function deleteInstance()
    {
        $this->delete();
        return $this->result('success',$this);
    }

    public function scopeFilter($query,$request)
    {
        return $query;
    }

    //Accessators

    public function getThumbnailAttribute()
    {
        return $this->gallaries()->where('use_for','thumbnail')->first();
    }

    //Relations

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }



}
