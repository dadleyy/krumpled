<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends ValidatedModel implements UserInterface, RemindableInterface {

  protected $table = 'users';

  protected $hidden = array('password');

  protected $fillable = array('username', 'email', 'firstname', 'lastname');

  public static $validates = array(
    'username' => 'required|min:3|max:16',
    'email' => 'required|email|unique:users',
    'firstname' => 'required|min:2|max:100',
    'lastname' => 'required|min:2|max:100',
    'password' => 'required|min:6|max:20'
  );

  /* ORM */
  public function bankAccounts() {
    return $this->hasMany('BankAccount');
  }

  public function income() {
    return $this->hasMany('Income');
  }

  /* functions */
  public function getAuthIdentifier() {
    return $this->getKey();
  }

  public function getAuthPassword() {
    return $this->password;
  }

  public function getRememberToken() {
    return $this->remember_token;
  }

  public function setRememberToken($value) {
    $this->remember_token = $value;
  }

  public function getRememberTokenName() {
    return 'remember_token';
  }

  public function getReminderEmail() {
    return $this->email;
  }

}
