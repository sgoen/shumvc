<?php
class Shumvc_FrontController {
    
    public function dispatch($uri){
        $exploded_uri = explode('/',$uri);
        $controller = null;
        
        // check if submitted class is not empty
        if(ucfirst($exploded_uri[0]) != ''){
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
        } else {
            $con = ucfirst(SHUMVC_DEFAULT_CONTROLLER).'Controller';
            $controller = new $con();   
            $controller->index();
        }
            
    }

    private function handleError(){
        include(DIR_BASEDIR.'/lib/vendor/shumvc/data/pages/404.php');
    }
  
}
