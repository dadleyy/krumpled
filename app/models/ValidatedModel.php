<?php

class ValidatedModel extends Eloquent {

  public static function validates($info) {
    $validator = Validator::make($info, static::$validates);
    return $validator->passes() == true ? true : $validator->messages()->all();
  }

}
