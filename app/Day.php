<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Periode;
use App\PeriodeJour;
class Day extends Model
{
    protected $fillable = [
        'jour', 'range_id' 
    ];

    public function range(){
        return $this->belongsTo(Range::class);
    }

    protected static function boot(){
        parent::boot();

        static::created(function($day){
            $periodes = Periode::where('isActive', true)->get();
            
            foreach ($periodes as $periode) {
                PeriodeJour::create([
                    'periode_id'    =>  $periode->id,
                    'day_id'    =>  $day->id
                ]);
            }
        });
    }
}
