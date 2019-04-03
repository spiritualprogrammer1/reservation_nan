<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonInterval;
use Carbon\Carbon;
use App\Day;

class Range extends Model
{
    protected $fillable = [
        'dateDebut', 'dateFin'
    ];

    protected static function boot(){
        parent::boot();

        static::created(function($range){
            $end = Carbon::parse($range->dateFin);
            $end = $end->modify('+1 day');
            $periodes = new \DatePeriod(Carbon::parse($range->dateDebut), CarbonInterval::day(), Carbon::parse($end));
            foreach ($periodes as $day) {
                Day::create([
                    'jour'   =>  Carbon::parse($day),
                    'range_id'   =>  $range->id 
                ]);                
            }
        });
    }

    public function days(){
        return $this->hasMany(Day::class);
    }
}
