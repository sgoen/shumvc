<?php
class Shumvc_BaseWebController {
    
    public function showTemplate($vars){
        
        $backtrace = debug_backtrace(__FUNCTION__);
        
        // get the function in lowercase
        $function = strtolower($backtrace[1]['function']);
        
        // get the class in lowercase and excluse the "Controller" part
        $tmp_class = $backtrace[1]['class'];
        $class = strtolower(str_replace('Controller', '', $tmp_class));
        
        // create a string with the full path
        $template_path = dirname(__FILE__).'/../../../app/templates/'.$class.'.'.$function.'.php';    
        
        echo $this->initSerpentTemplate($vars);
    }
    
    private function initSerpentTemplate($vars){
        $dir = dirname(__FILE__).'/../../../app/';
        // init serpent
        $serpent = new serpent();
        $serpent->compile_dir   = $dir.'templates_c/';
        $serpent->force_compile = true;
        $serpent->default_resource = 'file';
        $serpent->default_compiler = 'serpent';
        $serpent->setCharset('utf-8');

        // init resource
        $serpent->addPluginConfig('resource', 'file', array(
            'template_dir' => $dir.'templates/',
            'suffix' => '.tpl'
        ));

        // render template with data
        $serpent->pass($vars);
        return $serpent->render('helloworld.index');
    }
    
}
