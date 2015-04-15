<?php

namespace Controller;


class Welcome {

  public function __construct() {}


  public function action_index() {
    return (new \View('welcome/index'))->render(array(
      'controller' => 'Welcome',
      'action' => 'index',
    ));
  }

  public function action_params($one=1, $two=2) {
    return (new \Response)->set_content("Welcome controller params action with $one and $two");
  }

  public function action_json() {
    return (\Response::json(array('one' => 1)));
  }

}
