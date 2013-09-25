<?php

function clear_assets()
    {
        $path =  Yii::app()->getAssetManager()->getBasePath();
        $di = new DirectoryIterator($path);
        foreach($di as $d)
        {
            if(!$d->isDot())
            {
                echo "Removed ".$d->getPathname()."\n";
                $this->rem_dir($d->getPathname());
            }
        }
    }
 
function rem_dir($dir)
    {
        $files = glob($dir.'*', GLOB_MARK);
        foreach ($files as $file)
        {
            if (is_dir($file))
                $this->rem_dir($file);
            else
                unlink($file);           
        }
 
        if (is_dir($dir)) rmdir($dir);
    }