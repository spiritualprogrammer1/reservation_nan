<?php

namespace App\Traits;
 
trait ActiveTrait
{
    public function getIsActiveAttribute($value){
        return $value;
    }

    public function setIsActiveAttribute($value) {
        $this->attributes['isActive'] = $value;
    }
}