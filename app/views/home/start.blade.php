@extends('layouts.master')

@section('content')
<div class="page view start">
  <div class="form-container">
    <h1>login</h1>
    <form action="/login" method="POST">
      <div>
        <p>email</p>
        <input type="email" name="email" />
      </div>
      <div>
        <p>password</p>
        <input type="password" name="password" />
      </div>
      <input type="submit" name="submit" value="submit"/>
    </form>
  </div>
  <div class="form-container">
    <h1>signup</h1>
    <form action="/signup" method="POST">
      <div>
        <p>email</p>
        <input type="email" name="email" />
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
