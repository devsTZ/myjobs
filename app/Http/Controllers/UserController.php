<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use App\Http\Requests\RegistrationFormRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER= 'employer';
    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }

    public function storeSeeker(RegistrationFormRequest $request)
    {


        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type'=> self::JOB_SEEKER,
        ]); 
        return redirect()->route('login')-> with('successMessage', 'Your account was created Successful ');
    }


    public function storeEmployer(RegistrationFormRequest $request)
    {


        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type'=> self::JOB_POSTER,
            'user_trial'=> now()->addWeek(),
        ]); 
        return redirect()->route('login')-> with('successMessage', 'Your account was created Successful ');
    }
    public function login()
    {
        return view('users.login');
    }

    public function postLogin(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect() -> intended('dashboard');
        }
        return 'Wrong Email or Password'; 
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

}
