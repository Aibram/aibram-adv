<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PostInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:post-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to install dependencies and packages';

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
        if (!file_exists(base_path() . '/vendor')) {
            $this->info("Installing Dependencies .................");
            exec('composer install');
        }
        $this->call('config:cache');
        $this->call('env');
        $this->call('key:generate',['--ansi' => true]);
        $this->call('config:clear');
        $this->info("Migrating DB .................");
        $this->call('down');
        $this->call('up');
        $this->call('migrate:fresh',['--force' => true]);
        $this->info("Seeding DB .................");
        $this->call('db:seed',['--force' => true]);
        $this->call('passport:install');
        $this->info("Linking Storage to public Folder .................");
        $this->call('storage:link');
        $this->call('config:cache');
        return 1;
    }
}
