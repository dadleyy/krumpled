<?php

class Income extends ValidatedModel {
  
  protected $table = 'income';

  public $fillable = array('amount', 'repeats', 'start_date');

  public static $validates = array(
    'amount' => 'required|numeric|min:0',
    'repeats' => 'required|numeric|min:1',
    'start_date' => 'required|date',
  );

  public function distributions() {
    return $this->belongsToMany('BankAccount')->withPivot('ratio');
  }

}
