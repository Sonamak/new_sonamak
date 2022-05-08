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
    protected $fillable = ['id','title_en','title_fr','description_en','description_fr','itinerary_description_fr','itinerary_description_en'];
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


        if ( $request->include )  {

            // dd(collect($request->include));

            $includes = collect($request->include)->map(function($item) use ($tour){
                $item['tour_id'] = $tour->id;
                return $item;
            })->all();

            $tour->tourPrefrences()->upsert(
                $includes,
                ['id', 'type'],
                ['value']
            );
            

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

            $tour->tourPrefrences()->where('type','exclude')->delete();

            foreach ( $request->exclude as $item )  {

                $exclude['type'] = 'exclude';
                $exclude['value'] = $item;

                $tour->tourPrefrences()->create($exclude);
                
            }

        }


        if ( $request->removed_gallary ) {

            $tour->deleteImagesWithIdsBelongsToRelation([$request->removed_gallary],'storage/tour','gallaries');

        }

        if( $request->gallary ) {

            $tour->dimintions(['small' => '261x164','medium' => '500x500','large' => '1200x720'])
                  ->fit()
                  ->files($request->gallary)
                  ->withSaveRelation('gallaries')
                  ->usefor('gallary')
                  ->compile();

        }

        if ( $request->thumbnail ) {

            if (  $tour->thumbnail ) {

                $tour->deleteImagesWithIdsBelongsToRelation([$tour->thumbnail->id],'storage/tour','gallaries');

            }


            $tour->dimintions(['small' => '261x164','medium' => '500x500','large' => '1200x720'])
                  ->fit()
                  ->files($request->thumbnail)
                  ->withSaveRelation('gallaries')
                  ->usefor('thumbnail')
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
        return $this->result('success',$this);
    }

    public function scopeFilter($query,$request)
    {
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

    public function getIncludeAttribute()
    {
        return $this->tourPrefrences()->where('type','include')->get();
    }

    //Relations

    public function tourPrefrences()
    {
        return $this->hasMany(TourPreference::class);
    }

    public function itinerarie()
    {
        return $this->hasMany(Itinerarie::class);
    }

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }
}
