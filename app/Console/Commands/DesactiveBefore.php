<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Day;
use App\PeriodeJour;

class DesactiveBefore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'periode:desactiveBefore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $days = Day::where('jour', '<', Carbon::now()->format('Y-m-d'))
                        ->get();
        $periodes = PeriodeJour::all();
        foreach ($periodes as $periode) {
            foreach ($days as $day) {
                if($periode->day_id == $day->id){
                    $periode->isActive = false;
                    $periode->save();
                }
            }
        }
    }
}
