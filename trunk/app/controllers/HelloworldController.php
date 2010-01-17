<?php
class HelloworldController extends Shumvc_BaseWebController implements Shumvc_WebControllerInterface {
    public function webIndex(){
        // Set vars for template viewing
        $template_vars = array('message' => 'Hello World');
        // calling the parents showTemplate function to display the tenplate in the browser
        $this->showTemplate($template_vars);
    }
}
