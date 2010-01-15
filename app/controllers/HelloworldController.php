<?php
class HelloworldController extends Shumvc_BaseWebController implements Shumvc_WebControllerInterface {
    public function index(){
        $message = 'Hello World';
        
        // calling the parents showTemplate function to display the tenplate in the browser
        $this->showTemplate();
    }
}
