<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankAccountTypeIdToBankAccountTable extends Migration {

  public function up() {
    Schema::table('bank_accounts', function($table) {
      $table->integer('bank_account_type_id');
    });
  }

  public function down() {
    Schema::table('bank_accounts', function($table) {
      $table->dropColumn('bank_account_type_id');
    });
  }

}
