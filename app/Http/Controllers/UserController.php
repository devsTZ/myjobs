<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeekerRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function storeSeeker(SeekerRegistrationRequest $request)
    {
        // request() -> validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email'=>['required', 'string', 'email', 'max-255', 'unique:users' ],
        //     'password' => ['required'],
        // ]);

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type'=> self::JOB_SEEKER,
        ]); 
        return back();
    }
    public function login(){
        return view('users.login');
    }
    public function postLogin(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentails = $request -> only('email', 'password');
        if(Auth::attempt($credentails)){
            return redirect()->intended('dashboard');
        }
        return 'Wrong email or Password';
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
 