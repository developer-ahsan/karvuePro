@extends('layouts.app')

@section('content')
<section id="header-area" class="home-body">
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You! {{auth()->user()->email}}</h1>
  <p class="lead"><strong style="text-transform: capitalize;">{{$message}}</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
  </p>
</div>
</section>
@endsection