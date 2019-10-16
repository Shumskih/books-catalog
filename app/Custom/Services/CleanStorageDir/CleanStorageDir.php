<?php


namespace App\Custom\Services\CleanStorageDir;

/**
 * @method public void clean()
 */
class CleanStorageDir
{
    /**
     * @param string $pathPattern glob
     */
    public function clean($pathPattern = "./public/storage/*.*") {
        array_map('unlink', glob($pathPattern));
    }
}
