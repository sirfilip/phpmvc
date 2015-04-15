<?php

class Response {

  private $headers = array();
  private $status = 200;
  private $content = '';

  static function not_found($message='') {
    return (new Response())->set_status(404)->set_content($message);
  }

  public function __construct() {}

  public function send_headers() 
  {
    foreach($this->headers as $header => $value) {
      header("$header: $value");
    }
   return $this; 
  }

  public function send_content() 
  {
    echo $this->content;
  }

  public function set_header($header, $value) 
  {
    $this->headers[$header] = $value;
    return $this;
  }

  public function set_status($status) 
  {
    $this->status = $status;
    return $this;
  }

  public function set_content($content) 
  {
    $this->content = $content;
    return $this;
  }

  function send_status()
  {
    header('X-PHP-Response-Code: '.$this->status, true, $this->status);
    return $this;
  }

}
