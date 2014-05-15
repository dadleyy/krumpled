<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration {

  public function up() {
    Schema::create('income', function($table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->float('amount');
      $table->integer('repeats');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('income');
  }

}
