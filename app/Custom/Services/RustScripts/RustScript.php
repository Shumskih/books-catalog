<?php

namespace App\Custom\Services\RustScripts;

abstract class RustScript
{

    abstract function compile();

    abstract function isScriptsExists();

    abstract function createFolder();

    abstract function removeFolder();

    abstract function createScriptDir();

    abstract function removeScriptDir();

    public function isUploadsDirExists()
    {
        $uploadsDir = $this->getUploadsDir();

        if (file_exists($uploadsDir)) {
            return true;
        }
        return false;
    }

    public function getUploadsDir()
    {
        return sprintf(".%spublic%suploads%s",
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR);
    }
}
