<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        //validation
        $attributes=request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        //attempt to login the user
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, these credentials do not match.'
            ]);
        };

        //regenerate the session token
        request()->session()->regenerate();
        //redirect
        return redirect('/');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/')->with('message','Successfully Logged Out');
    }
}
