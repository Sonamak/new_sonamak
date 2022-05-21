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
    protected $fillable = [
        'title_en',
        'title_fr',
        'description_en',
        'description_fr',
        'itinerary_description_fr',
        'itinerary_description_en',
        'country_text_in_en',
        'country_text_in_fr',
        'duration_text_in_en',
        'duration_text_in_fr',
        'destination_id',
        'category_id'
    ];

    protected $appends = ['lowest_price_package'];
    
    protected $root = 'storage/tour';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    { 
        $request->merge([
            'destination_id' => ($request->destination_id != 'Null') ? $request->destination_id : null,
            'category_id' => ($request->category_id != 'Null') ? $request->category_id : null
        ]);

        // dd($request->all());

        $tour = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if ( $request->include )  {

            // dd(collect($request->include));

            $includes = collect($request->include)->map(function($item) use ($tour){
                $item['tour_id'] = $tour->id;
                return $item;
            })->all();

            // dd($includes);

            $tour->tourPrefrences()->upsert(
                $includes,
                ['id'],
                ['value_en','value_fr','type']
            );
            

        }


        if ( $request->location ) {

            if (  $tour->location ) {

                $tour->deleteImagesWithIdsBelongsToRelation([$tour->location->id],'storage/tour','gallaries');

            }


            $tour->dimintions(['medium' => '334x210','small' => '261x164'])
                  ->resize()
                  ->files($request->location)
                  ->withSaveRelation('gallaries')
                  ->usefor('location')
                  ->compile();


        }


        if ( $request->removed_include ) { 

            $tour->tourPrefrences()->where('type','include')->whereIn('id',$request->removed_include)->delete();

        }


        if ( $request->removed_exclude ) { 

            $tour->tourPrefrences()->where('type','exclude')->whereIn('id',$request->removed_exclude)->delete();

        }


        if ( $request->removed_itinerary  )  {

            $tour->itinerarie()->whereIn('id',$request->removed_itinerary)->delete();

        }



        if ( $request->exclude )  {

            $excludes = collect($request->exclude)->map(function($item) use ($tour){
                $item['tour_id'] = $tour->id;
                return $item;
            })->all();

            $tour->tourPrefrences()->upsert(
                $excludes,
                ['id'],
                ['value_en','value_fr','type']
            );

        }


        if ( $request->removed_gallary ) {

            $tour->deleteImagesWithIdsBelongsToRelation($request->removed_gallary,'storage/tour','gallaries');

        }

        if( $request->gallary ) {

            $tour->dimintions(['medium' => '451x301'])
                  ->resize()
                  ->files($request->gallary)
                  ->withSaveRelation('gallaries')
                  ->usefor('gallary')
                  ->compile();

        }

        if ( $request->thumbnail ) {

            if (  $tour->thumbnail ) {

                $tour->deleteImagesWithIdsBelongsToRelation([$tour->thumbnail->id],'storage/tour','gallaries');

            }


            $tour->dimintions(['large' => '448x309' ,'medium' => '339x210','small' => '260x157'])
                  ->fit()
                  ->files($request->thumbnail)
                  ->withSaveRelation('gallaries')
                  ->usefor('thumbnail')
                  ->compile();


        }

        if ( $request->background ) {

            if (  $tour->background ) {

                $tour->deleteImagesWithIdsBelongsToRelation([$tour->background->id],'storage/tour','gallaries');

            }


            $tour->dimintions(['large' => '1870x556'])
                  ->fit()
                  ->files($request->background)
                  ->withSaveRelation('gallaries')
                  ->usefor('background')
                  ->compile();


        }

        if ( $request->itinerary ) {

            $itinerary = collect($request->itinerary)->map(function($item) use ($tour){
                $item['tour_id'] = $tour->id;
                return $item;
            })->all();
           

            $tour->itinerarie()->upsert(
                $itinerary,
                ['id'],
                ['title_en','title_fr','description_en','description_fr','day']
            );

        }

        return ['message' => 'success','payload' => $tour];
    }

    public function toggleFeature()
    {
        $this->feature = $this->feature ? false : true;
        $this->save();
        return $this->result('success',$this);
    }

    public function deleteInstance()
    {
        $this->delete();
        $this->tourPrefrences()->delete();
        $this->deleteImagesWithIdsBelongsToRelation($this->gallaries->pluck('id'),$this->root,'gallaries');
        return $this->result('success',$this);
    }

    public function scopeFilter($query,$request)
    {
        if ( $request->name ) {
            
            if ( app()->make('saved_cookie',['type' => 'language']) == 'en' ) {
                $query->where('title_en','like',"%$request->name%");
            } else {
                $query->where('title_fr','like',"%$request->name%");
            }

        }
        
        if ( $request->destination_id ) {
            $query->where('destination_id',$request->destination_id);
        }

        if ( $request->category ) {
            $query->where('category_id',$request->category);
        }

        if ( $request->extra ) {
            $query->where('destination_id',null);
        }

        return $query;
    }

    //Mutators 

    public function getIncludesAttribute()
    {
        return $this->tourPrefrences()->where('type','include')->get();
    }

    public function getExcludesAttribute()
    {
        return $this->tourPrefrences()->where('type','exclude')->get();
    }

    public function getGallaryAttribute()
    {
        return $this->gallaries()->where('use_for','gallary')->get();
    }

    public function getThumbnailAttribute()
    {
        return $this->gallaries()->where('use_for','thumbnail')->first();
    }

    public function getLocationAttribute()
    {
        return $this->gallaries()->where('use_for','location')->first();
    }

    public function getBackgroundAttribute()
    {
        return $this->gallaries()->where('use_for','background')->first();
    }

    public function getIncludeAttribute()
    {
        return $this->tourPrefrences()->where('type','include')->get();
    }

    public function getLowestPricePackageAttribute()
    {
        $default_currency = app()->make('saved_cookie',['type' => 'currency']) ?? 'usd';
        if($default_currency)
            return $this->packages()->orderBy($default_currency.'_price')->first();
    }

    public function getLowestPricePackageCurrencyAttribute()
    {
        $default_currency = app()->make('saved_cookie',['type' => 'currency']) ?? 'usd';
        $currency ="$default_currency".'_price';
        if($default_currency)
            return $this->packages()->orderBy($default_currency.'_price')->first()->$currency;
    }

    public function getLowestPricePackageRoomAttribute()
    {
        $default_currency = app()->make('saved_cookie',['type' => 'currency']) ?? 'usd';
        $package = $this->packages()->orderBy($default_currency.'_price')->first();
        if($package) {
            $room = $this->packages()->orderBy($default_currency.'_price')->first()->room_type;
            return str_replace(' ','_',strtolower($room));
        }
       
    }

    //Relations

    public function tourPrefrences()
    {
        return $this->hasMany(TourPreference::class);
    }

    public function itinerarie()
    {
        return $this->hasMany(Itinerarie::class)->orderBy('day');
    }

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function packages()
    {
        return $this->hasManyThrough(Package::class,Price::class);
    }
}


