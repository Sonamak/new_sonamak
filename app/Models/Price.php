<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;

class Price extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id'
        ,'name_en'
        ,'name_fr'
        ,'tour_id'
        ,'description_lower_season_en'
        ,'description_lower_season_fr'
        ,'description_upper_season_en'
        ,'description_upper_season_fr'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    {
        $price = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if ( $request->package ) {
            $packages = collect($request->package)->map(function($item) use ($price){
                $item['price_id'] = $price->id;
                $item['top_selling'] =  isset($item->top_selling) ? true : false;
                return $item;
            })->all();

            $price->packages()->upsert(
                $packages,
                ['id'],
                ['season','room_type','usd_price','cad_price','eur_price','top_selling']
            );

        }

        return (new self)->result($price,'success');
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

    public function toggleBestSelling()
    {
        $this->best_selling = $this->best_selling ? false : true;
        $this->save();
    }

    public function getLowestSeasonsPackagesAttr()
    {
        $this->packages()->where('season','Lower Season')->get();
    }

    public function getPeakSeasonsPackagesAttr()
    {
        $this->packages()->where('season','Lower Season')->get();
    }
    // Relations
    
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }


}
