<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;
use App\Http\Services\ImageService;

class Project extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService,ImageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id','title','article','background','style','tecnology','country','country_iso','service_id'];

    protected $root ="storage/project";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    {
        $country_data = explode('|',$request->country);

        $request->merge([
            'country_iso' => $country_data[0],
            'country' => $country_data[1]
        ]);

        $project = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        $project->coders()->sync($request->coders);

        if($request->thumbnail) {

            if($project->thumbnail)
                $project->deleteImagesWithIdsBelongsToRelation([$project->thumbnail->id],$project->root,'gallaries');


            $project->dimintions(['large' => '1602x1067','small' => '261x164'])
                ->resize()
                ->files($request->thumbnail)
                ->withSaveRelation('gallaries')
                ->usefor('thumbnail')
                ->compile();
        }

        if($request->mockup) {

            if($project->mockup)
                $project->deleteImagesWithIdsBelongsToRelation([$project->mockup->id],$project->root,'gallaries');

            $project->dimintions(['large' => '1602x1067','small' => '261x164'])
                ->resize()
                ->files($request->mockup)
                ->withSaveRelation('gallaries')
                ->usefor('mockup')
                ->compile();
        }

        if($request->banner) {

            if($project->banner)
                $project->deleteImagesWithIdsBelongsToRelation([$project->banner->id],$project->root,'gallaries');

            $project->dimintions(['large' => '1602x1067'])
                ->resize()
                ->files($request->banner)
                ->withSaveRelation('gallaries')
                ->usefor('banner')
                ->compile();
        }

        if($request->gallary) {
            $project->dimintions(['large' => '500x500'])
                ->resize()
                ->files($request->gallary)
                ->withSaveRelation('gallaries')
                ->usefor('gallary')
                ->compile();
        }

        if($request->removed_gallary) {
            $project->deleteImagesWithIdsBelongsToRelation($request->removed_gallary,$project->root,'gallaries');
        }

        if($request->keywords) {
            Seo::createInstance($project,$request->keywords,'keyword');
        }
        

        return (new self)->result('success',$project);
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

    public function toggleFeature()
    {
        $this->feature = ($this->feature) ? false : true;
        $this->save();
    }

    //Accessator 

    public function getThumbnailAttribute()
    {
        return $this->gallaries()->where('use_for','thumbnail')->first();
    }

    public function getMockupAttribute()
    {
        return $this->gallaries()->where('use_for','mockup')->first();
    }

    public function getBannerAttribute()
    {
        return $this->gallaries()->where('use_for','banner')->first();
    }

    public function getKeywordsAttribute()
    {
        return $this->seo()->where('type','keyword')->get();
    }

    public function getGallaryAttribute()
    {
        return $this->gallaries()->where('use_for','gallary')->get();
    }

    public function getCodersAttribute()
    {
        return $this->coders()->get();
    }

    public function getServiceNameAttribute()
    {
        if ( $this->service()->first() ) {
            $lowercase = strtolower($this->service()->first()->name);
            $strip = str_replace(' ','-',$lowercase);
            return $strip;
        } else return null;
   
    }

    //Relations

    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }

    public function seo()
    {
        return $this->morphMany(Seo::class,'seoable');
    }

    public function coders()
    {
        return $this->belongsToMany(Coder::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
