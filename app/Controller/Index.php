<?php

namespace Controller;


class Index {
  public function action_index() {
    $response = new \Response();
    $response->set_content('Index action of the index controller');
    return $response;
  }
}
