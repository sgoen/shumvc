<?php
/**
 * @name Shumvc_BaseWebController
 * @author J.Smit <j.smit@sgoen.nl>
 * @license MIT
 */
 
/**
 * The base webcontroller is to be extended by custom controllers and provides
 * all the basic operations. 
 */
class Shumvc_BaseWebController {
    
    private $html_head_tags = array();

    public function setTitle($title){
        $this->html_head_tags['title'] = $title;
    }
    
    public function setStylesheet($style){
        $this->html_head_tags['style'] = $style;
    }
    
}
