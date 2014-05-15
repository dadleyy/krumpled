<?php

class UserController extends BaseController {

  public function store() {
    $user_info = array(
      'username' => Input::get('username'),
      'firstname' => Input::get('firstname'),
      'lastname' => Input::get('lastname'),
      'email' => Input::get('email'),
      'password' => Input::get('password')
    );

    $status = User::validates($user_info);
    $messages = array();

    if(!is_array($status)) {
      $user = new User;
      $user->firstname = $user_info['firstname'];
      $user->lastname = $user_info['lastname'];
      $user->username = $user_info['username'];
      $user->email = $user_info['email'];
      $user->password = Hash::make($user_info['password']);
      $user->save();
      Auth::loginUsingId($user->id);
    } else {
      $messages = $status;
    }

    return Redirect::route('start')->with(array('signup_attempt' => $user_info, 'messages' => $messages));
  }

}
