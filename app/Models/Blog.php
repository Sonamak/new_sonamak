<?php

namespace App\Models;

use App\Http\Services\ImageService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;

class Blog extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,ValidationService,ImageService;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'article_in_en',
        'article_in_fr',
        'language',
        'title_en',
        'title_fr',
        'category_id'
    ];

    protected $root = 'storage/blog';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    static function upsertInstance($request)
    {
        $request->merge([
            'category_id' => ($request->category_id != 'Null') ? $request->category_id : null
        ]);

        $blog = self::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        if ( $request->thumbnail )  {

            if( $request->id ) {
                $blog->deleteImagesWithIdsBelongsToRelation([$blog->thumbnail->id],'storage/destination','gallaries');
            }

            $blog->dimintions(['medium' => '500x500','small' => '261x164'])
                ->fit()
                ->files($request->thumbnail)
                ->withSaveRelation('gallaries')
                ->usefor('thumbnail')
                ->compile();

        }

        if ( $request->background )  {

            if( $blog->background ) {
                $blog->deleteImagesWithIdsBelongsToRelation([$blog->background->id],'storage/blog','gallaries');
            }

            $blog->dimintions(['large' => '1200x720'])
                ->fit()
                ->files($request->background)
                ->withSaveRelation('gallaries')
                ->usefor('background')
                ->compile();

        }

        return (new self)->result($blog,'success');
    }

    public function deleteInstance()
    {
        $this->delete();
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

        if ( $request->category ) {
            $query->where('category_id',$request->category);
        }
    }

    // Scope

    public function scopeWithLanguage($query)
    {
        $language = (Config::get('app.locale') == 'en') ? 'english' : 'french';
        $query->where('language','mixed')->orWhere('language',$language);
        return $query;
    }

    //Accessators
    public function getThumbnailAttribute()
    {
        return $this->gallaries()->where('use_for','thumbnail')->first();
    }

    public function getBackgroundAttribute()
    {
        return $this->gallaries()->where('use_for','background')->first();
    }


    //Relations
    public function gallaries()
    {
        return $this->morphMany(Gallary::class,'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
