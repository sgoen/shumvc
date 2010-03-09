<?php
class HelloworldController extends Shumvc_BaseWebController implements Shumvc_WebControllerInterface {
    public function webIndex(){
        // Set vars for template viewing
        $template_vars = array(
            'message' => 'Hello World',
        );
        
        // deprecated
        // calling the parents showTemplate function to display the tenplate in the browser
        //$this->showTemplate($template_vars);
        
        // return the vars for combining them to the view
        return $template_vars;
    }
}
