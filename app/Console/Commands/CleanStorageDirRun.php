<?php

namespace App\Console\Commands;

use App\Custom\Facades\CleanStorageDirService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CleanStorageDirRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clean {--dbfresh : run migrate:fresh --seed}';

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
        CleanStorageDirService::clean();

        if($this->option('dbfresh')) {
            Artisan::call('migrate:fresh', [
                '--seed' => true,
            ]);
            $this->info('Database had fresh and seed');
        }

        $this->info('Storage dir cleaned');
    }
}
