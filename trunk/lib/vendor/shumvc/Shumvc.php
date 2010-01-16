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
    
    public function define_array( $array, $keys = NULL ){
        foreach( $array as $key => $value ){
            $keyname = ($keys ? $keys . "_" : "") . $key;
            if( is_array( $array[$key] ) )
                define_array( $array[$key], $keyname );
            else
                define( $keyname, $value );
        }
    }
}
