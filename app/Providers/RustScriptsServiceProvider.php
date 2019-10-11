<?php

namespace App\Providers;

use App\Custom\Services\RustScripts\RustScriptFactory;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RustScriptsServiceProvider extends ServiceProvider implements DeferrableProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('rustScripts', 'App\Custom\Services\RustScripts\RustScriptFactory');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [RustScriptFactory::class];
    }
}
