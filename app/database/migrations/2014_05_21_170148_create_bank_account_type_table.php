<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTypeTable extends Migration {

  public function up() {
    Schema::create('bank_account_types', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->boolean('additive');
    });
  }

  public function down() {
    Schema::drop('bank_account_types');
  }

}
