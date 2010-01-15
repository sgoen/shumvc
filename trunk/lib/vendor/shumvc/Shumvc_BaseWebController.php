<?php
class Shumvc_BaseWebController {
    public function showTemplate(){
        $backtrace = debug_backtrace(__FUNCTION__);
        
        // get the function in lowercase
        $function = strtolower($backtrace[1]['function']);
        
        // get the class in lowercase and excluse the "Controller" part
        $tmp_class = $backtrace[1]['class'];
        $class = strtolower(str_replace('Controller', '', $tmp_class));
        
        // create a string with the full path
        $template_path = dirname(__FILE__).'/../../../app/templates/'.$class.'.'.$function.'.php';
        
        include($template_path);
    }
}
