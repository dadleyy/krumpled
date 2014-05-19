<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeBankAccountTable extends Migration {

  public function up() {
    Schema::create('bank_account_income', function($table) {
      $table->increments('id');
      $table->integer('bank_account_id');
      $table->integer('income_id');
    });
  }

  public function down() {
    Schema::drop('bank_account_income');
  }

}
