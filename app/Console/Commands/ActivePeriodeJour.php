<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Day;
use App\PeriodeJour;
class ActivePeriodeJour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'periode:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Active les periode les éléments de la table periode jour correspondant à la semaine actuelle';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $days = Day::where('jour', '>=', Carbon::now()->startOfWeek())
                    ->where('jour', '<=', Carbon::now()->endOfWeek())
                ->get();
        $periodes = PeriodeJour::all();
        
        if($days && $periodes){
            foreach ($periodes as $periode) {
                foreach ($days as $day) {
                    if($periode->day_id == $day->id){
                        $periode->isActive = true;
                        $periode->save();
                    }
                }
            }
        }
    }
}
