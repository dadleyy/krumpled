<?php

class IncomeController extends BaseController {

  public function store() {
    $income_info = array(
      'amount' => Input::get('amount'),
      'repeats' => Input::get('repeats'),
      'start_date' => Input::get('start')
    );

    $status = Income::validates($income_info);
    $messages = array();
    if(!is_array($status)) {
      $income = Income::create($income_info);
      Auth::user()->income()->save($income);
    } else {
      $messages = $status;
    }

    return Redirect::route('dashboard')->with(array(
      'messages' => $messages
    ));
  }

}
