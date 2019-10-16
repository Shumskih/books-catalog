<?php

namespace App\Providers;

use App\Custom\Services\CleanStorageDir\CleanStorageDir;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CleanStorageDirServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cleanStorageDir', 'App\Custom\Services\CleanStorageDir\CleanStorageDir');
    }

    /**
     * Bootstrap services.
     *
     * @return array
     */
    public function boot()
    {
        return [CleanStorageDir::class];
    }
}
