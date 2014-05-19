<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatioColumnToPivot extends Migration {

  public function up() {
    Schema::table('bank_account_income', function($table) {
      $table->integer('ratio');
    });
  }

  public function down() {
    Schema::table('bank_account_income', function($table) {
      $table->dropColumn('ratio');
    });
  }

}
