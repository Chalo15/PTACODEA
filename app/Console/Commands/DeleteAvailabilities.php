<?php

namespace App\Console\Commands;

use App\Models\Availability;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteAvailabilities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'availabilities:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all available unused records';

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
     * @return int
     */
    public function handle()
    {
        $today = today()->toDateString();

        Availability::where('state','=', 'DISPONIBLE')->where('date','<',$today)->delete();
        Availability::where('state','=', 'PENDIENTE')->where('date','<',$today)->delete();
        Log::info("Funciona");
    }
}
