<?php

class BankAccountTypeTableSeeder extends Seeder {

  private $default_types = array(
    array('name' => 'checking', 'additive' => true),
    array('name' => 'savings', 'additive' => true),
    array('name' => 'credit', 'additive' => false)
  );

  public function run() {
    foreach($this->default_types as $default_type) {
      $acct_type = new BankAccountType;
      $acct_type->name = $default_type['name'];
      $acct_type->additive = $default_type['additive'];
      $acct_type->save();
    }
  }

}
