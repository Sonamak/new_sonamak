<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveLink extends Model
{
    use HasFactory;

    public function toggleActive()
    {
        if ( $this->active )  {
            $this->active = false;
        } else {
            $this->active = true;
        }

        $this->save();

        return $this;
    }

    public function appearOn($request)
    {
        $this->appear_on = $request->value;
        $this->save();
    }
}
