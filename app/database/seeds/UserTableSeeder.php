<?php

class UserTableSeeder extends Seeder {

  public function run() {
    $admin = new User;
    $admin->username = "admin";
    $admin->email = "admin@krumpled.com";
    $admin->firstname = "admin";
    $admin->lastname = "admin";
    $admin->password = Hash::make("admin");
    $admin->save();
  }

}
