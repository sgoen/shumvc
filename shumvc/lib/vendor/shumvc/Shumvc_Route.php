<?php
/**
 * @name Shumvc_Route
 * @desc Basic Route class to define dynamic url routes.
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
class Shumvc_Route {
    private $route;
    private $class;
    private $method;
    private $elements = array();
    
    /**
     * The constructor also defines the route.
     *
     * @param $route
     */
    function __construct($route){
        $this->route = $route;
    }
    
    public function setClass($class){
        $this->class = $class;
    }
    
    public function setMethod($method){
        $this->method = $method;
    }
    
    public function getClass(){
        return $this->class;
    }
    
    public function getMethod(){
        return $this->method;
    }
    
    public function getElements(){
        return $this->elements;
    }
    
    /**
     * Add an element to the elements array
     */
    public function addElement($key, $value){
        $this->elements[$key] = $value;
    }
    
    public function hasElements(){
        if(sizeof($this->elements) > 0){
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Return an exploded version of the $route string
     */
    public function getRouteExploded(){
        $array = explode('/', $this->route);
        return $array;
    }
    
    /**
     * Checks wether the class given for the route is dynamic.
     * Dynamic classes are defined as :class
     */
    public function classIsDynamic(){
        return preg_match('/^:/', $this->class);
    }
    
    /**
     * Checks wether the method given for the route is dynamic.
     * Dynamic methods are defined as :method
     */
    public function methodIsDynamic(){
        return preg_match('/^:/', $this->method);
    }
}

