<?php

namespace App\Custom\Facades;

use Illuminate\Support\Facades\Facade;

class RustScriptsService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rustScripts';
    }
}
