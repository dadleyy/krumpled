@extends('layouts.master')
<?php
$sattp = is_array(Session::get('signup_attempt')) ? Session::get('signup_attempt') : false;
$messages = is_array(Session::get('messages')) ? Session::get('messages') : false;
?>
@section('content')
<div class="page view start oc">
  <div class="oc">
    <div class="msgs hw">
    @if($messages)
      @foreach($messages as $message)
        <p class="warn"><?= $message ?></p>
      @endforeach
    @endif
    </div>
  </div>
  <div class="form-container hw">
    <h1>login</h1>
    <form action="/login" method="POST">
      <div>
        <p>email</p>
        <input type="email" name="email" value="" />
      </div>
      <div>
        <p>password</p>
        <input type="password" name="password" />
      </div>
      <input type="submit" name="submit" value="submit"/>
    </form>
  </div>
  <div class="form-container hw">
    <h1>signup</h1>
    <form action="/signup" method="POST">
      <div>
        <p>email</p>
        <input type="email" name="email" value="<?= $sattp && $sattp['email'] ? $sattp['email'] : '' ?>" />
      </div>
      <div>
        <p>first name</p>
        <input type="text" name="firstname" value="<?= $sattp && $sattp['firstname'] ? $sattp['firstname'] : '' ?>"/>
      </div>
      <div>
        <p>last name</p>
        <input type="text" name="lastname" value="<?= $sattp && $sattp['lastname'] ? $sattp['lastname'] : '' ?>" />
      </div>
      <div>
        <p>username</p>
        <input type="text" name="username" value="<?= $sattp && $sattp['username'] ? $sattp['username'] : '' ?>" />
      </div>
      <div>
        <p>password</p>
        <input type="password" name="password" />
      </div>
      <input type="submit" name="submit" value="submit"/>
    </form>
  </div>
</div>
@endsection
