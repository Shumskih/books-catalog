<?php

namespace App\Custom\Services\RustScripts;

class RustScriptWindows extends RustScript
{

    public function compile()
    {
        exec('rustc rust/scripts/remove_dir.rs && move remove_dir.exe rust/compiled/windows/ &&  move remove_dir.pdb rust/compiled/windows/');
        exec('rustc rust/scripts/create_dir.rs && move create_dir.exe rust/compiled/windows/ &&  move create_dir.pdb rust/compiled/windows/');
    }

    public function isScriptsExists()
    {
        if (file_exists('./rust/compiled/windows/create_dir.exe')
            && file_exists('./rust/compiled/windows/create_dir.pdb')
            && file_exists('./rust/compiled/windows/remove_dir.exe')
            && file_exists('./rust/compiled/windows/remove_dir.pdb')) {
            return true;
        } else {
            return false;
        }
    }

    public function removeScriptDir()
    {
        return sprintf(".%srust%scompiled%swindows%sremove_dir",
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR);
    }

    public function createScriptDir()
    {
        return sprintf(".%srust%scompiled%swindows%screate_dir",
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR);
    }

    public function createFolder()
    {
        exec($this->createScriptDir());
    }

    public function removeFolder()
    {
        exec($this->removeScriptDir());
    }
}
