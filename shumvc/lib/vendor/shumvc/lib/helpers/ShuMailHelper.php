<?php
class ShuMailHelper(){
    protected $from;
    protected $reply_to;
    protected $to;
    protected $subject;
    protected $body;
    
    public function setFrom($from){
        $this->from = $from;
    }
    
    public function setReplyTo($reply_to){
        $this->reply_to = $reply_to;
    }
    
    public function setTo($to){
        $this->to = $to;
    }
    
    public function setSubject($subject){
        $this->subject = $subject;
    }
    
    public function setBody($body){
        $this->body = $body;
    }
    
    public function send(){
      $headers = 'From: '.$from."\r\n" . 'Reply-To: '.$reply_to. "\r\n" . 'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $body, $headers);
    }
}
        
