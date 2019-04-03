<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ActiveTrait;

class Periode extends Model
{
    use ActiveTrait;

    protected $fillable = [
        'heureDebut', 'heureFin', 'isActive'
    ];

    public function periode_jours(){
        return $this->hasMany(PeriodeJour::class);
    }
}
