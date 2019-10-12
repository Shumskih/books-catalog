<?php

namespace App\Custom\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void compile()
 * @method static bool isScriptsExists()
 * @method static void createFolder()
 * @method static void removeFolder()
 * @method static void createScriptDir()
 * @method static void removeScriptDir()
 * @method static bool isUploadsDirExists()
 * @method static string getUploadsDir()
 *
 */
class RustScriptsService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rustScripts';
    }
}
