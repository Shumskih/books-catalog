<?php

namespace App\Providers;

use App\Custom\Services\Messages\Messages;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('message', function () {
            return new Messages;
        });
    }

    public function provides()
    {
        return [Messages::class];
    }
}
