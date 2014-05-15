<?php

class UserObserver {

  public function saving($user) { 
    $user->email = strtolower($user->email);
    $user->firstname = strtolower($user->firstname);
    $user->lastname = strtolower($user->lastname);
  }

  public function creating($user) { 
  }

}

?>
