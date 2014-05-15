@extends('layouts.master')

@section('content')
<div class="oc">
  <p>{{ nl2br(File::get(storage_path().'/logs/laravel.log')) }}</p>
</div>
@endsection
