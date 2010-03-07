<?php
/**
 * @name Shumvc
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
 
/**
 * The FrontController dispatches the request by executing the proper
 * action and function.
 */
 class Shumvc_FrontController {
    
     /**
     * Checks the request and executes the proper class and function
     *
     * @param $uri
     */
     public function dispatch($uri){
        $exploded_uri = explode('/',$uri);
        $controller = null;

        // check if submitted class is not empty
        if(ucfirst($exploded_uri[0]) != ''){
            // check if the class exists
            if(class_exists(ucfirst($exploded_uri[0]).'Controller')){
                
                $controller_name = ucfirst($exploded_uri[0]);
                $function_name = $exploded_uri[1];
                
                // get get proper controller name for instancing
                $con = $controller_name . 'Controller';
                
                $controller = new $con();
                $function = 'web'.ucfirst($function_name);
                
                // check if the method exists
                if(method_exists($controller, $function)){
                    // if found execute the submitted action    
                    $template = strtolower($controller_name . '.' . $function_name);
                    echo $this->initSerpentTemplate($template, $controller->$function());
                } else if($function == 'web'){
                    // on empty execute the index
                    $template = strtolower($controller_name . '.index');
                    echo $this->initSerpentTemplate($template, $controller->webIndex());
                } else {
                    $this->handleError();
                }
                
            } else {
                $this->handleError();
            } 
        } else {
            $con = ucfirst(SHUMVC_DEFAULT_CONTROLLER).'Controller';
            $controller = new $con();   
            $template = strtolower(SHUMVC_DEFAULT_CONTROLLER) . '.index';
            
            echo $this->initSerpentTemplate($template, $controller->webIndex());
        }
            
    }

    /**
    * Basic 404 displaying
    */
    private function handleError(){
        include(DIR_BASEDIR.'/lib/vendor/shumvc/lib/pages/404.php');
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
