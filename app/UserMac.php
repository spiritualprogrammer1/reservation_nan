<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActiveTrait;

class UserMac extends Model
{
    use ActiveTrait;

    protected $fillable = [
        'mac_id', 'user_id', 'isActive', 'periode_jour_id'
    ];

    public function mac(){
        return $this->belongsTo(Mac::class,'mac_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function periode_jour(){
        return $this->belongsTo(PeriodeJour::class,'periode_jour_id');
    }
}
