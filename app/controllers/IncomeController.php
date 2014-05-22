<?php

class IncomeController extends BaseController {

  public function store() {
    $income_info = array(
      'amount' => Input::get('amount'),
      'repeats' => Input::get('repeats'),
      'start_date' => Input::get('start'),
      'bank_accounts' => Input::get('bank_accounts')
    );

    $status = Income::validates($income_info);
    $messages = array();
    if(!is_array($status)) {
      $income = new Income;
      $income->amount = $income_info['amount'];
      $income->repeats = $income_info['repeats'];
      $income->start_date = $income_info['start_date'];
      Auth::user()->income()->save($income);

      foreach(Input::get('bank_accounts') as $account_config) {
        $account = BankAccount::where('nickname', '=', $account_config['name'])->first();
        DB::table('bank_account_income')->insert(array(
          'bank_account_id' => $account->id,
          'income_id' => $income->id,
          'ratio' => $income->amount / $account_config['amount']
        ));
      }
    } else {
      $messages = $status;
    }

    return Redirect::route('dashboard')->with(array(
      'messages' => $messages
    ));
  }

}
