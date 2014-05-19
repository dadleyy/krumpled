@extends('layouts.master')

<?php
$add_attempt = Session::get('add_attempt');
?>
@section('content')
<div class="page view start oc">
  <a href="{{ route('logout') }}">logout</a>
  <div class="oc">
    <div class="hw">
    @if(Session::get('messages'))
    @foreach(Session::get('messages') as $message)
    <p>{{ $message }}</p>
    @endforeach
    @endif
    </div>
  </div>
  <div class="oc">
    <div class="user-info hw">
      <h1>User info</h1>
      <p>{{ Auth::user()->firstname }}</p>
      <p>{{ Auth::user()->lastname }}</p>
      <p>{{ Auth::user()->username }}</p>
      <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="bank-info hw">
      <h1>Bank accounts</h1>
      @if(Auth::user()->bankAccounts()->get())
        <ul>
        @foreach(Auth::user()->bankAccounts()->get() as $bank_account)
          <li>
            <p>{{ $bank_account->nickname }}: {{ $bank_account->balance }}</p>
            <form action="/bankaccounts/{{ $bank_account->id }}/delete" method="POST">
              <input type="submit" value="delete" />
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </li>
        @endforeach
        </ul>
      @endif
      <p>add new</p>
      {{ Form::model(new BankAccount, array('route' => 'bankaccounts.store')) }}
        <div>
          <p>nickname</p>
          <input type="text" name="nickname" />
        </div>
        <div>
          <p>balance</p>
          <input type="text" name="balance" />
        </div>
        <div>
          <input type="submit" name="submit" />
        </div>
      {{ Form::close() }}
    </div>
  </div>
  <div class="oc">
    <div class="income-info hw">
      <h1>Income</h1>
      @if(Auth::user()->income()->get())
        <ul>
        @foreach(Auth::user()->income()->get() as $income_source)
          <li>
            <p>amount: {{ $income_source->amount; }} | repeats: {{ $income_source->repeats; }} | stated: {{ $income_source->start_date; }}</p>
          </li>
        @endforeach
        </ul>
      @endif
      <p>add new</p>
      {{ Form::model(new Income, array('route' => 'income.store')) }}
      <div>
        <p>amount:</p>
        <input type="text" name="amount" />
      </div>
      <div>
        <p>repeats (days):</p>
        <input type="text" name="repeats" />
      </div>
      <div>
        <p>start on:</p>
        <input type="date" name="start" />
      </div>
      <div>
        <input type="submit" name="submit" />
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection
