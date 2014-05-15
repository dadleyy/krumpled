<?php

class AdminController extends BaseController {

  public function __construct() {
    $this->beforeFilter('auth');
  }

  public function getLog() {
    return View::make('admin.log');
  }

}
