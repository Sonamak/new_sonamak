<?php

namespace App\Models;

use App\Http\Services\ImageService;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Setup extends Model
{
    use HasFactory,ValidationService,ImageService;

    protected $route = 'storage/setup';
    protected $guarded = [];
    protected $root = 'storage/system';

    static function store ( $request )  
    {

        if ( $request->website_title  )  {

            self::updateOrCreate(
                ['type' => 'website title'],
                [
                    'type'  => 'website title',
                    'value' => $request->website_title
                ]
            );

        }

        if ( $request->new_field )  {

            self::updateOrCreate(
                ['type' => 'new field'],
                [
                    'type'  => 'new field val',
                    'value' => $request->new_field
                ]
            );

        }

        if ( $request->website_description )  {

            self::updateOrCreate(
                ['type' => 'website description'],
                [
                    'type'  => 'website description',
                    'value' => $request->website_description
                ]
            );

        }

        if ( $request->website_footer_description_en )  {
            self::updateOrCreate(
                ['type' => 'website footer description english'],
                [
                    'type'  => 'website footer description english',
                    'value' => $request->website_footer_description_en
                ]
            );

        }

        if ( $request->website_footer_description_fr )  {

            self::updateOrCreate(
                ['type' => 'website footer description french'],
                [
                    'type'  => 'website footer description french',
                    'value' => $request->website_footer_description_fr
                ]
            );

        }

        if ( $request->footer_logo )  {

            if ( $request->footer_logo )  {

                $setup = self::where('type','website footer logo')->pluck('value')->toArray();

                if( $setup ) 
                    File::delete( public_path((new self)->root.'/small/'.$setup[0] ) );


            }

            $setup = self::updateOrCreate(
                ['type' => 'website footer logo'],
                [
                    'type' => 'website footer logo',
                ]
            );

            $logo = $setup->dimintions(['small' => '261x164'])
                ->resize()
                ->files($request->footer_logo)
                ->usefor('thumbnail')
                ->compile();

            $setup->value = $logo[0];
            $setup->save();

        }

        if ( $request->header_logo )  {

            if ( $request->header_logo )  {

                $setup = self::where('type','header logo')->pluck('value')->toArray();

                if( $setup ) {
                    File::delete( public_path((new self)->root.'/small/'.$setup[0] ) );
                }


            }

            $setup = self::updateOrCreate(
                ['type' => 'header logo'],
                [
                    'type' => 'header logo',
                ]
            );

            $logo = $setup->dimintions(['small' => '261x164'])
                ->resize()
                ->files($request->header_logo)
                ->usefor('thumbnail')
                ->compile();


            $setup->value = $logo[0];
            $setup->save();

        }

        if ( $request->short_logo )  {

            if ( $request->short_logo )  {


                $setup = self::where('type','short logo')->pluck('value')->toArray();

                if( $setup ) 
                    File::delete( public_path((new self)->root.'/small/'.$setup[0] ) );


            }

            $setup = self::updateOrCreate(
                ['type' => 'short logo'],
                [
                    'type' => 'short logo',
                ]
            );

            $logo = $setup->dimintions(['small' => '261x164'])
                ->resize()
                ->files($request->short_logo)
                ->usefor('thumbnail')
                ->compile();

            $setup->value = $logo[0];
            $setup->save();

        }

        if ( $request->seo_keyword ) {

            $setup = self::updateOrCreate(
                ['type' => 'seo'],
                [
                    'type' => 'seo',
                ]
            );

            Seo::createInstance($setup,$request->seo_keyword,'keywords');
        }
    }

    static function getSetting( $type ) 
    {
        return self::where('type',$type)->pluck('value')->toArray();
    }

    //Relations
    public function seo()
    {
        return $this->morphMany(Seo::class,'seo');
    }
    
}
