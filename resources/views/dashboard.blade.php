@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justfy-content-center">
        Hello,  {{auth() -> user()-> name}}
        @if (Auth::check() && auth()->user()->user_type == 'employer')
                   <p class="alert alert-warning">Your trial will expire on {{auth()->user()->user_trial}}</p>
        @endif
        <div class="row"> 
  <div class="col-sm-6 col-sm-6 col-md-3 col-lg-3 ">
    <div class="card bg-primary">
      <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <a href="#" class="btn btn-dark">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-sm-6 col-md-3 col-lg-3 ">
    <div class="card bg-danger">
      <div class="card-body">
        <h5 class="card-title">Post Job</h5>
        <a href="#" class="btn btn-dark">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-sm-6 col-md-3 col-lg-3 ">
    <div class="card bg-success">
      <div class="card-body">
        <h5 class="card-title">All Jobs</h5>
        <a href="#" class="btn btn-dark">View</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-3 col-lg-3 ">
    <div class="card bg-warning">
      <div class="card-body">
        <h5 class="card-title">Item 4</h5>
        <a href="#" class="btn btn-dark">View</a>
      </div>
    </div>
  </div>
</div>
    </div>
</div>

@endsection