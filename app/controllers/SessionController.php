<?php

class SessionController extends BaseController {

  public function postIndex() {
  }

  public function deleteIndex() {
    return Redirect::route('start');
  }

}

?>

