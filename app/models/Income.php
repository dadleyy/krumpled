<?php

class Income extends ValidatedModel {
  
  protected $table = 'income';

  public $fillable = array('amount', 'repeats', 'start_date');

  public static $validates = array(
    'amount' => 'required|numeric|min:0',
    'repeats' => 'required|numeric|min:1',
    'start_date' => 'required|date',
  );

  public static function validates($info) {
    $status = parent::validates($info);

    if(is_array($status))
      return $status;

    $status = array();
    if(!is_array($info['bank_accounts']) || count($info['bank_accounts']) < 0) {
      $status[] = 'the income must be associated with a bank account';
    } else {
      $total = 0;
      foreach($info['bank_accounts'] as $account) {
        if(!array_key_exists('name', $account) || BankAccount::where('nickname', '=', $account['name'])->first() == null)
          $status[] = 'the account must have a valid name';

        $total += (float)$account['amount'];
      }

      if($total != $info['amount'])
        $status[] = 'the distribution of income must add up to the total';
    }

    return count($status) < 1 ? true : $status;
  }

  public function user() {
    return $this->belongsTo('User');
  }

  public function distributions() {
    return $this->belongsToMany('BankAccount')->withPivot('ratio');
  }

}
