<?php

class SessionController extends BaseController {

  public function store() {
    $user_info = array(
      'email' => Input::get('email'),
      'password' => Input::get('password')
    );

    if(Auth::attempt($user_info))
      return Redirect::route('dashboard');
    else
      return Redirect::route('start');
  }

  public function destroy() {
    Auth::logout();
    return Redirect::route('start');
  }

}

?>

