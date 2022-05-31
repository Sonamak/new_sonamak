<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;
use App\Http\Services\ImageService;

class Service extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService,ImageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id','name','number'];

    protected $root = "storage/service";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    {
        $service = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        $service->dimintions(['small' => '261x164'])
            ->resize()
            ->files($request->thumbnail)
            ->withSaveRelation('gallaries')
            ->usefor('thumbnail')
            ->compile();

        return (new self)->result($service,'success');
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

    //Accessator 

    public function getThumbnailAttribute()
    {
        return $this->gallaries()->where('use_for','thumbnail')->first();
    }

    public function getStripNameAttribute()
    {
        $lowercase = strtolower($this->name);
        $strip = str_replace(' ','-',$lowercase);
        return $strip;
    }


    //Relations

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }


}
