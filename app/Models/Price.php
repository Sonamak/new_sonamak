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
    protected $fillable = ['id','name_en','name_fr','tour_id','description_en','description_fr'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function upsertInstance($request)
    {
        $price = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if ( $request->package ) {

            $packages = collect($request->package)->map(function($item) use ($price){
                $item['price_id'] = $price->id;
                return $item;
            })->all();

            $price->packages()->upsert(
                $packages,
                ['id'],
                ['season','room_type','usd_price','cad_price','eur_price']
            );

        }

        return self::result($price,'success');
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
