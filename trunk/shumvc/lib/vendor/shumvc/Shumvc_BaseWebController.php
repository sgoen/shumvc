<?php
/**
 * @name Shumvc_BaseWebController
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
 
/**
 * The base webcontroller is to be extended by custom controllers and provides
 * all the basic operations. 
 */
class Shumvc_BaseWebController {
    
    private $html_head_tags = array();

    public function setTitle($title){
        $this->html_head_tags['title'] = $title;
    }
    
    public function setStylesheet($style){
        $this->html_head_tags['style'] = $style;
    }
    
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

        $vars['shumvc_app'] = $this->getShumvcVars();

        // render template with data
        $serpent->pass($vars);
        return $serpent->render($template_path);
    }
    
    private function getShumvcVars(){
	$title = '';
        $style = '';

        // check if a title is given by the controller, else use the default
        // from the config file.
        if(isset($this->html_head_tags['title'])){
            $title = '<title>'.$this->html_head_tags['title'].'<title>';
        } else {
            $title = '<title>'.SHUMVC_APP_TITLE.'</title>';        
        }

        // check if a stylesheet is given by the controller, else use the
        // default from the config file.
        if(isset($this->html_head_tags['style'])){
            $style = '<link rel="stylesheet" type="text/css" href="/style/'.$this->html_head_tags['style'].'" />';
        } else {
            $style = '<link rel="stylesheet" type="text/css" href="/style/'.SHUMVC_APP_STYLE.'" />';        
        }

	$shumvc_vars = array(
            'title' => $title,
            'style' => $style,
        );
	
        return $shumvc_vars; 
    }
}
