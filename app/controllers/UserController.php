<?php

class UserController extends BaseController {

  public function postIndex() {
    $user_info = array(
      'username' => Input::get('username'),
      'firstname' => Input::get('firstname'),
      'lastname' => Input::get('lastname'),
      'password' => Input::get('password'),
      'email' => Input::get('email')
    );

    $validator = Validator::make($user_info, User::$validates);
    if($validator->fails())
      return Redirect::route('start')->with(array('signup_attempt' => $user_info, 'messages' => $validator->messages()->all()));

    $password = Hash::make($user_info['password']);
    
    $user = User::create(array_except($user_info, 'password'));
    $user->password = $password;
    $user->save();
    Auth::loginUsingId($user->id);
    return Redirect::route('start');
  }

}
