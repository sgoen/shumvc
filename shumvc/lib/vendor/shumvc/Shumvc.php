<?php
/**
 * @name Shumvc
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
 
/**
 * Thus shumvc final class provides two important functions
 * autoload of the used classes and a function to define an
 * array of variables.
 */
final class Shumvc {
    
    /**
     * Autoloads a classname from the directories array
     *
     * @param string $classname name of the class to be loaded
     */
    public static function autoload ($classname) {
            $directories = array(
                '../shumvc/lib/vendor/shumvc/',
                '../shumvc/lib/vendor/shumvc/lib/helpers',
                '../shumvc/app/controllers/',
                '../shumvc/app/models/',
                '../shumvc/lib/helpers/',
            );
 
            foreach ($directories as $directory) {
                $filename = $directory.$classname.'.php';
                if (file_exists($filename)) {
                    require($filename);
                    return;
                }
            }
    }
    
    /**
     * Defines an array of variables so they are globally accessible.
     * The index is used as the name of the variable.
     *
     * @param array() $array array of varaiables which should be defined
     */
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
