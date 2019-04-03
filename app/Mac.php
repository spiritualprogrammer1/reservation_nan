<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActiveTrait;

class Mac extends Model
{
    use ActiveTrait;

    protected $fillable = [
        'numMac', 'isActive'
    ];

    public function user_macs(){
        return $this->hasMany(UserMac::class);
    }
}
