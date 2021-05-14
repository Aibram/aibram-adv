<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;




class DBInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:db-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to connect DB to the project';

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
        //DB Connection
        $this->info("Installing DB .................");
        $connectionType = $this->ask('DB Connection Type','mysql');
        if( !in_array($connectionType,["sqlite","mysql","pgsql","sqlsrv"])){
            $this->error("There is no driver with that name: $connectionType");
            return 0;
        }
        $this->info("Connection is set");
        $host = $this->ask('DB Host','127.0.0.1');
        $this->info("Host is set");
        $port = $this->ask('DB Port','3306');
        $this->info("Port is set");
        $database = $this->ask('DB Name','aibram');
        $this->info("DB Name is set");
        $username = $this->ask('DB Username','mostafa');
        $this->info("DB Username is set");
        $password = $this->ask('DB Password','147896325');
        $this->info("DB Password is set");
        $this->line("------------------------------------------");

        $file = DotenvEditor::setKeys([
            'DB_CONNECTION' => $connectionType,
            'DB_HOST' => $host,
            'DB_PORT' => $port,
            'DB_DATABASE' => $database,
            'DB_USERNAME' => $username,
            'DB_PASSWORD' => $password,
        ]);
        DotenvEditor::save();
        return 1;
    }
}
