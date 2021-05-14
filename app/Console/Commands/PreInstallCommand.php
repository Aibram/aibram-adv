<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class PreInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:pre-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to update application settings';

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
        if(!file_exists('.env')){
            copy('.env.example', '.env');
        }

        $this->info("Installing Application Environment .................");
        //APP URL
        $appUrl = $this->ask('App Url','http://localhost');
        $this->info("APP Url changed");
        $appName = $this->ask('App Name','Aibram');
        $this->info("APP Name changed");
        $environment = $this->anticipate('App Environment', ['development', 'production'],'development');
        $this->info("Environement changed");
        $timezone = $this->ask('Current Timezone','Asia/Aden');
        $this->info("Timezone changed");
        $locale = $this->ask('App Localization','ar');
        $this->info("Localization changed");

        $file = DotenvEditor::setKeys([
            'APP_URL' => $appUrl,
            'APP_NAME' => $appName,
            'APP_ENV' => $environment,
            'APP_TIMEZONE' => $timezone,
            'APP_LOCALE' => $locale,
        ]);
        DotenvEditor::save();

        return 1;
    }
}
