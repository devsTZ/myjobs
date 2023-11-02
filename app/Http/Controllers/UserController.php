<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeekerRegistrationRequest;
use App\Models\User;

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
}
