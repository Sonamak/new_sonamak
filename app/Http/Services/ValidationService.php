<?php 

namespace App\Http\Services;

trait ValidationService {

    public function result($result,$payload = []) 
    {
        return ['message' => $result,'payload' => $payload];
    }

}