<?php


class Autoload
{

    public function loadClass($className)
    {
        $fileName = str_replace("app", DIR_ROOT, $className);
        $fileName = str_replace("\\", "/", $fileName) . ".php";
        if (file_exists($fileName)) {
            include $fileName;
        } else {
            Die("Can't find file " . $fileName);
        }
    }


}