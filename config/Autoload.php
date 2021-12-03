<?php

class Autoload
{
    public static function _autoload($class)
    {
        global $rep;
        $filename = $class.'.php';
        $dir =array('./','config/','controleur/','DAL/','modeles/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename;
            if (file_exists($file))
            {
                include $file;
            }
        }

    }
}


?>
