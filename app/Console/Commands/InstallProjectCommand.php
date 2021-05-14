<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Console\VendorPublishCommand;
use Illuminate\Support\Facades\Artisan;

class InstallProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to install the app on your machine from scratch';

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
        $exitCode = $this->call('project:pre-install');
        if($exitCode==0){
            $this->error("Something went wrong");
            return 0;
        }
        $this->newLine(3);

        $exitCode = $this->call('project:db-install');
        if($exitCode==0){
            $this->error("Something went wrong");
            return 0;
        }
        $this->newLine(3);
        
        $exitCode = $this->call('project:post-install');

        
        return 1;
        
    }
}
