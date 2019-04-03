<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActiveTrait;

class PeriodeJour extends Model
{
    use ActiveTrait;

    protected $fillable = [
        'periode_id', 'day_id', 'isActive'
    ];

    public function user_mac(){
        return $this->hasMany(UserMac::class);
    }

    public function periode(){
        return $this->belongsTo(Periode::class);
    }

    public function day(){
        return $this->belongsTo(Day::class);
    }

}
