<?php
final class Shumvc {
    
    public static function autoload ($classname) {
            $directories = array(
                '../lib/vendor/shumvc/',
                '../app/controllers/',
                '../app/models/',
                '../lib/helpers/',
            );
 
            foreach ($directories as $directory) {
                $filename = $directory.$classname.'.php';
                if (file_exists($filename)) {
                    require($filename);
                    return;
                }
            }
    }
}
