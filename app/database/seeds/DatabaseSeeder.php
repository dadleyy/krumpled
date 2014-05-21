<?php

class DatabaseSeeder extends Seeder {

  private $seeds = array(
    'UserTableSeeder',
    'BankAccountTypeTableSeeder'
  );

  public function run() {
    Eloquent::unguard();
    foreach($this->seeds as $seed_class) {
      $this->call($seed_class);
    }
  }

}
