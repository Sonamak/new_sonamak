<?php 

namespace App\Http\Services;

trait Sync {

    public function hasManySync( $relation,$data,$primary_key = null) 
    {

        $primary_key = $primary_key ?? 'id';

        $get_created_items = collect($data)->where('id',null)->toArray();

        $get_deleted_items = collect($data)->pluck($primary_key)->all();

        $get_updated_items = collect($data)->where('id','!=',null)->toArray();

        $this->$relation()->whereNotIn('id',$get_deleted_items)->delete();


        $this->$relation()->createMany($get_created_items);

        foreach( $get_updated_items as $item ) {

            $this->$relation()->where($primary_key,$item[$primary_key])->update($item);

        }
    }

}