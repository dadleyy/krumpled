<?php

class HomeController extends BaseController {

  protected $layout = "layouts.master";

  public function startPage() {
    return View::make('home.start');
  }

  public function dashboardPage() {
    return View::make('home.dashboard');
  }

}
