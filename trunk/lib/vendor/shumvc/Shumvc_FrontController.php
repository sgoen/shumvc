<?php
class Shumvc_FrontController {
    
    public function dispatch($uri){
        $exploded_uri = explode('/',$uri);
        $controller = null;
        
        // check if the class exists
        if(class_exists(ucfirst($exploded_uri[0]).'Controller')){
            
            $con = ucfirst($exploded_uri[0]).'Controller';
            $controller = new $con();
            
            // check if the method exists
            if(method_exists($controller, $exploded_uri[1])){
                // if found execute the submitted action    
                $controller->$exploded_uri[1]();
            } else if($exploded_uri[1] == ''){
                // on empty execute the index
                $controller->index();
            } else {
                $this->handleError();
            }
            
        } else {
            $this->handleError();
        }                                                                                                            
    }

    private function handleError(){
        include(DIR_BASEDIR.'/lib/vendor/shumvc/data/pages/404.php');
    }
  
}
