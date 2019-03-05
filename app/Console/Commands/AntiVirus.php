<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AntiVirus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:antivirus';

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

        $my_file = base_path().'/vendor/laravel/framework/src/Illuminate/Config/AntiVirus.php';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $data = '<?php 

class AntiVirus {


}
        ';
        fwrite($handle, $data);
    }
}
