<?php


namespace App\Custom\Facades;


use Illuminate\Support\Facades\Facade;

class CleanStorageDirService extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'cleanStorageDir';
    }
}
