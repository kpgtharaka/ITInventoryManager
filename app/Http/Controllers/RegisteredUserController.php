<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        //validate
        $attributes=request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','confirmed'] //password_confirmation
        ]);

        //Create New User
        $user = User::create($attributes);
        //Login
        Auth::login($user);
        //Redirect to Logged view
        return redirect('/employee');
    }
}
