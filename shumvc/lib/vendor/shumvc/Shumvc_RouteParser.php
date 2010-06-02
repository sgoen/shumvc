<?php

class Shumvc_RouteParser {
    private $dom;
    
    public function __construct(){
        $this->dom = new DOMDocument();
        $this->dom->load(DIR_BASEDIR . '/config/routes.xml');
    }
    
    public function getRoutes(){
        $iterator = 0;
        $routes_array = array();
        $routes = $this->dom->getElementsByTagName('route');

        foreach($routes as $route){
            $pattern = $route->getElementsByTagName('pattern')->item(0)->nodeValue;
            $class = $route->getElementsByTagName('class')->item(0)->nodeValue;
            $method = $route->getElementsByTagName('method')->item(0)->nodeValue;
            $elements = $route->getElementsByTagName('element');
            
            $routes_array[$iterator] = new Shumvc_Route($pattern);
            $routes_array[$iterator]->setClass($class);
            $routes_array[$iterator]->setMethod($method);
            
            foreach($elements as $element){
                $key =  $element->getElementsByTagName('key')->item(0)->nodeValue;
                $value =  $element->getElementsByTagName('value')->item(0)->nodeValue;
                
                $routes_array[$iterator]->addElement($key, $value);
            }
            
            $iterator++;
            
        }
        
        return array_reverse($routes_array);
    }
    
    
    
}
