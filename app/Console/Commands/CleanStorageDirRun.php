<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Custom\Facades\CleanStorageDir;

class CleanStorageDirRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean storage dir';

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
        CleanStorageDir::clean();

        $this->info('Storage dir cleaned');
    }
}
