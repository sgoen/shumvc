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
               
		$function = 'web'.ucfirst($exploded_url[1]);
		 
                // check if the method exists
                if(method_exists($controller, $function)){
                    // if found execute the submitted action    
                    $controller->$function();
                } else if($function == 'web'){
                    // on empty execute the index
                    $controller->webIndex();
                } else {
                    $this->handleError();
                }
                
            } else {
                $this->handleError();
            } 
        } else {
            $con = ucfirst(SHUMVC_DEFAULT_CONTROLLER).'Controller';
            $controller = new $con();   
            $controller->webIndex();
        }
            
    }

    private function handleError(){
        include(DIR_BASEDIR.'/lib/vendor/shumvc/lib/pages/404.php');
    }
  
}
