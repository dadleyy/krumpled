<?php

class BankAccountsController extends BaseController {

  public function __construct() {
    $this->beforeFilter('auth');
  }

  public function store() {
    $account_info = array(
      'nickname' => Input::get('nickname'),
      'balance' => Input::get('balance')
    );

    $status = BankAccount::validates($account_info);
    Log::info('Creating bank account: name[' . $account_info['nickname'] . ']');

    $messages = array();
    if(!is_array($status)) {
      $account = new BankAccount;
      $account->nickname = $account_info['nickname'];
      $account->balance = $account_info['balance'];
      Auth::user()->bankAccounts()->save($account);
    } else {
      $messages = $status;
    }

    return Redirect::route('dashboard')->with(array(
      'add_attempt' => $account_info,
      'messages' => $messages
    ));
  }

  public function destroy($id = false) {
    if(!$id)
      return Redirect::route('dashboard');

    $account = Auth::user()->bankAccounts()->where('id', '=', $id)->first();
    $account->delete();
    return Redirect::route('dashboard');
  }

}
