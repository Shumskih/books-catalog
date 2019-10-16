<?php


namespace App\Custom\Facades;


use Illuminate\Support\Facades\Facade;

class CleanStorageDir extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'cleanStorageDir';
    }
}
