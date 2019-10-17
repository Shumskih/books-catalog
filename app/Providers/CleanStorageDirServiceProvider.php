<?php

namespace App\Providers;

use App\Custom\Services\CleanStorageDir\CleanStorageDir;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CleanStorageDirServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('cleanStorageDir', function() {
            return new CleanStorageDir;
        });
    }

    public function provides()
    {
        return [CleanStorageDir::class];
    }

    /**
     * Bootstrap services.
     *
     * @return array
     */
    public function boot()
    {

    }
}
