<?php
class HelloworldController extends Shumvc_BaseWebController implements Shumvc_WebControllerInterface {
    public function index(){
        $message = 'Hello World';
        include(dirname(__FILE__).'/../templates/helloworld.index.php');
    }
}
