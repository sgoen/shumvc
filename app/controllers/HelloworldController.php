<?php
class HelloworldController implements Shumvc_WebControllerInterface {
    public function index(){
        echo '<h1>Hello World</h1>'; 
    }
}
