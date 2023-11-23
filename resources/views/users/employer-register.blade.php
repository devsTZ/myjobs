@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for an employee?</h1>
            <h3>Please Create an Account</h3>
            <img src="{{asset('images/img-1.png')}}" class="col-md-6 w-50" alt="">
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Employer Register
                </div>
                <form action="{{route('store.employer')}}" method="post"> @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="fullname">Company Name</label>
                        <input type="text" name="name" class="form-control">
                        <!-- validation -->
                        @if($errors->has('name'))
                        <span class="text-danger  small">{{$errors->first('name')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" class="form-control">
                      <!-- validation -->
                      @if($errors->has('email'))
                        <span class="text-danger small">{{$errors->first('email')}}</span>
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
                    <small class="small">Already Have an Account <a href="{{route('login')}}">Login</a></small>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection