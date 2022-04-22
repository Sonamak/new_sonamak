<?php 

namespace App\Http\Services;

class ValidationService {

    public function result($result,$payload = []) 
    {
        return [$result,$payload];
    }

}