<?php 

namespace App\Http\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageService {

    protected $dimintionsArray = [];
    protected $service = 'fit';
    protected $files = [];
    protected $relation;
    protected $use_for = null;

    public function dimintions($dimintions)
    {
        $this->dimintionsArray = $dimintions;
        return $this;
    }

    public function fit()
    {
        $this->service = 'fit';
        return $this;
    }

    public function resize()
    {
        $this->service = 'resize';
        return $this;
    }

    public function store($root)
    {
        $this->root = public_path($root);
        return $this;
    }

    public function withSaveRelation($relation)
    {
        $this->relation = $relation;
        return $this;
    }

    public function files($files)
    {   
        $this->files = $files;
        return $this;
    }

    public function usefor($use_for)
    {
        $this->use_for = $use_for;
        return $this;
    }

    public function compile()
    {
        $names = [];
        $root = public_path($this->root);

        foreach( $this->files as $file )  {

            $unique_name  = time() . uniqid() . '.' . $file->extension();

            array_push($names,$unique_name);

            $file_path = Image::make($file->getRealPath());

            if( $this->service == 'fit' ) {

               foreach( $this->dimintionsArray as $size => $dimintion ) {

                    $dimintion_explode = explode('x',$dimintion);

                    $file_path->resize($dimintion_explode[0], $dimintion_explode[1], function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($root.'/'."$size/".$unique_name);
                    
                    
                }

            }

            if( $this->relation ) {

                $relation = $this->relation;

                $this->$relation()->create(['name' => $unique_name,'use_for' => $this->use_for]);

            }

        }

        return $names;
    }

    public function removeReleatedImage($relation = 'gallaries',$root = null)
    {
        
        if( ! $root ) {

            $dirictoris  = scandir($this->root);

            foreach($dirictoris as $dirictory) {
                if( is_dir(public_path($this->root.'/'.$dirictory) ) ) {

                    foreach($this->$relation as $file) {
                        File::delete(public_path($this->root.'/'.$dirictory.'/'.$file->name));
                    }

                }

            }

        }

    }

}