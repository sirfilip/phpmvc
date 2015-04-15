<?php

class View {
  public function __construct($view = '') {
    $this->view = $view;
  }

  public function render($params=array()) {
    extract($params);
    ob_start();
    require_once PROJECT_DIR."/app/views/{$this->view}.php";
    $contents = ob_get_contents();
    ob_end_clean();
    return (new \Response)->set_content($contents);
  }
}
