<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration {

  public function up() {
    Schema::create('bank_accounts', function($table) {
      $table->increments('id');
      $table->string('nickname');
      $table->float('balance');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('bank_accounts');
  }

}
