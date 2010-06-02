<?php
/**
 * @name Shumvc_Dispatcher
 * @desc This dispatcher selects the proper route for a request and fires it off.
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
 
class Shumvc_Dispatcher {
    
    private $routes = array();
    private $controller_postfix = 'Controller';
    private $method_prefix = 'web';
    
    /**
     * Loads all the defined routes from routes.xml to the routes array().
     */
    function __construct(){
        $parser = new Shumvc_RouteParser();
        $this->routes = $parser->getRoutes();
    }
    
    /**
     * Dispatches an url to a matched route.
     *
     * @param $uri
     */
    public function dispatch($uri){
        // merge post and get
        $request = array_merge($_POST, $_GET);
        
        // break up the uri in an array
        $exploded_uri = explode('/', $uri);
        
        $route = $this->getMatchedRoute($exploded_uri);
        
        $class_name = $route->getClass();
        $method_name = $route->getMethod();
        
        // check if the class and/or method is dynamic
        if($route->classIsDynamic()){
            // if dynamic determine its position
            $class_key = array_search(':class', $route->getRouteExploded());
            $class_name = ucfirst($exploded_uri[$class_key]) . $this->controller_postfix;
        } else {
            $class_name = ucfirst($route->getClass()) . $this->controller_postfix;
        }
        
        if($route->methodIsDynamic()){
            // if dynamic determine its position
            $method_key = array_search(':method', $route->getRouteExploded());
            $method_name = $this->method_prefix . ucfirst($exploded_uri[$method_key]);
        } else {
            $method_name = $this->method_prefix . ucfirst($route->getMethod());
        }
        
        if($route->hasElements()){
            foreach($route->getElements() as $key => $value){
                $element_key = array_search($value, $route->getRouteExploded());
                $request[$key] = $exploded_uri[$element_key];
            }
        }
        
        if(class_exists($class_name)){
            $c = new $class_name();
            if(method_exists($c, $method_name)){
                $template = strtolower($route->getClass() . '.' . $route->getMethod());
                echo $this->initSerpentTemplate($template, $c->$method_name($request));
            } else {
                echo 'Method doesn\'t exist';
            }
        } else {
            echo 'Class doesn\'t exist';
        }
        
    }    
    
    /**
     * Returns the proper route.
     *
     * @param #exploded_uri
     */
    private function getMatchedRoute($exploded_uri){
       // loop through all the routes (start at the last route)
       for($i = sizeof($this->routes) - 1; $i >= 0; $i--){
           // check for a route which is as long as the uri
           $current_route = $this->routes[$i]->getRouteExploded();
           if(sizeof(array_filter($current_route)) == sizeof(array_filter($exploded_uri))){
               return $this->routes[$i];
           }
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
