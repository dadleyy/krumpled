<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBankAccountUsersRel extends Migration {

  public function up() {
    Schema::table('bank_accounts', function($table) {
      $table->integer('user_id');
    });
  }

  public function down() {
    Schema::table('bank_accounts', function($table) {
      $table->dropColumn('user_id');
    });
  }

}
