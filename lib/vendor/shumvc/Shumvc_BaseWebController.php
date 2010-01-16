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
        $template_path = $class.'.'.$function;    
        
        echo $this->initSerpentTemplate($template_path, $vars);
    }
    
    private function initSerpentTemplate($template_path, $vars){
        // init serpent
        $serpent = new serpent();
        $serpent->compile_dir = DIR_TEMPLATES_C;
        $serpent->force_compile = SERPENT_FORCE_COMPILE;
        $serpent->default_resource = SERPENT_DEFAULT_RESOURCE;
        $serpent->default_compiler = SERPENT_DEFAULT_COMPILER;
        $serpent->setCharset(SERPENT_CHARSET);

        // init resource
        $serpent->addPluginConfig('resource', 'file', array(
            'template_dir' => DIR_TEMPLATES,
            'suffix' => '.tpl'
        ));

        // render template with data
        $serpent->pass($vars);
        return $serpent->render($template_path);
    }
    
}
