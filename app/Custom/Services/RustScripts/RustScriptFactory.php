<?php
namespace App\Custom\Services\RustScripts;

class RustScriptFactory
{
    public function factory()
    {
        if ($this->serverOS() == 'Linux') {
            return new RustScriptLinux();
        } else {
            return new RustScriptWindows();
        }
    }

    private function serverOS()
    {
        $os = explode(' ', php_uname());
        if (in_array('Linux', $os)) {
            return 'Linux';
        }
        return 'Windows';
    }
}
