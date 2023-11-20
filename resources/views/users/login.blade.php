@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for a job?</h1>
            <h3>Please Login to an Account</h3>
            <img src="{{asset('images/img-1.png')}}" class="col-md-6 w-50" alt="">
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <form action="{{route('login.post')}}" method="post"> @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        <!-- validation -->
                        @if($errors->has('email'))
                        <span class="text-danger  small">{{$errors->first('email')}}</span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                          <!-- validation -->
                          @if($errors->has('password'))
                        <span class="text-danger  small">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <small class="small">Dont't Have an Account <a href="{{route('create.seeker')}}">Register</a></small>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection