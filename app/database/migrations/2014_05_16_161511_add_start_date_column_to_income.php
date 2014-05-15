<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartDateColumnToIncome extends Migration {

  public function up() {
    Schema::table('income', function($table) {
      $table->dateTime('start_date');
    });
  }

  public function down() {
    Schema::table('income', function($table) {
      $table->dropColumn('start_date');
    });
  }

}
