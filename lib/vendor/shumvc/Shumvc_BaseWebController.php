<?php
class Shumvc_BaseWebController {
    
    public function showTemplate($vars){
        
        $backtrace = debug_backtrace(__FUNCTION__);
        
        // get the function in lowercase
        $function = strtolower($backtrace[1]['function']);
	// remove the web prefix, this can be done better ..
	$parsed_function = str_replace('web','',$function);
        
        // get the class in lowercase and excluse the "Controller" part
        $tmp_class = $backtrace[1]['class'];
        $class = strtolower(str_replace('Controller', '', $tmp_class));
        
        // create a string with the full path
        $template_path = $class.'.'.$parsed_function;  
        
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
        
        // add the shumvc vars to the vars array
        $vars['shumvc_app'] = $this->getShumvcVars();

        // render template with data
        $serpent->pass($vars);
        return $serpent->render($template_path);
    }
    
    private function getShumvcVars(){
        $shumvc_vars = array(
            'title' => '<title>'.SHUMVC_APP_TITLE.'</title>',
            'style' => '<link rel="stylesheet" type="text/css" href="/style/'.SHUMVC_APP_STYLE.'" />',
        );
        
        return $shumvc_vars; 
    }
}
