<?php

namespace App\Models;

use App\Http\Services\ImageService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;
use Intervention\Image\ImageManagerStatic as Image;

class Tour extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService,ImageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id','title','description_en','description_fr'];
    protected $root = 'storage/tour';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function upsertInstance($request)
    {   
        $tour = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if( $request->gallary ) {

            $tour->dimintions(['small' => '100x100','medium' => '200x200','large' => '300x300'])
                  ->fit()
                  ->files($request->gallary)
                  ->withSaveRelation('gallaries')
                  ->usefor('gallary')
                  ->compile();

        }

        return ['message' => 'success','payload' => $tour];
    }

    public function deleteInstance()
    {
        $this->delete();
        return $this->result($this,'success');
    }

    public function scopeFilter($query,$request)
    {
        return $query;
    }

    //Relations

    public function TourPrefrences()
    {
        return $this->hasMany(TourPreference::class);
    }

    public function Itinerarie()
    {
        return $this->hasMany(Itinerarie::class);
    }

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }
}

