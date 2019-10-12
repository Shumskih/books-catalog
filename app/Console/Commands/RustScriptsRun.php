<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Custom\Services\RustScripts\RustScriptFactory;

class RustScriptsRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rustScripts:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run rust scripts to compile rust scripts and create uploads folder';

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
        $factory = new RustScriptFactory();
        $obj = $factory->factory();
        if (!$obj->isScriptsExists()) {
            $obj->compile();
        }
        if (!$obj->isUploadsDirExists()) {
            $obj->createFolder();
        } else {
            $obj->removeFolder();
            $obj->createFolder();
        }
        $this->info('RustScripts completed successfully');
    }
}
