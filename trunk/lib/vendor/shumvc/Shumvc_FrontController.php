<?php
class Shumvc_FrontController {
    
    public function dispatch($uri){
        $exploded_uri = explode('/',$uri);
        $controller = null;
        
        echo $uri.'<br>';
        
        // check if the class exists
        if(class_exists(ucfirst($exploded_uri[0]).'Controller')){
                $con = ucfirst($exploded_uri[0]).'Controller';
                $controller = new $con();
        } else {
            $this->handleError();
        }                                                                                                            
        
        // check if the method exists
        if(method_exists($controller, $exploded_uri[1])){
                $action = '';
        }
    }

    private function handleError(){
	echo 'not found';
    }

    private function curPageURL() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on"){
            $pageURL .= "s";
        }
        
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        
        return $pageURL;
    }    
}
