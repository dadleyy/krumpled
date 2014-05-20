<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class BankAccount extends ValidatedModel {

  protected $table = 'bank_accounts';

  protected $fillable = array('nickname', 'balance');

  public static $validates = array(
    'nickname' => 'required|min:3|max:16',
    'balance' => 'required|numeric'
  );

  public function incomeSources() {
    return $this->hasManyThrough('BankAccount', 'Income', 'bank_account_id', 'income_id');
  }

}
