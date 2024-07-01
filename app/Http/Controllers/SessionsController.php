<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {

        # Validation
        $attributes = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => 'required',
        ]);

        # Attempt to log the user in with the given attributes
        if(! auth()->attempt($attributes)){
            # equ. to =>
            /*
                if(! Hash::check($attributes['password'], User::where('email', $attributes['email'])->first()->password)){
                }
            */
            session()->flash('failure', 'Incorrect password!');

            # throw an exception if no user matches the given credentials
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
            // equ. to =>
            // return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified.']);
        }
        
        # solves the problem of session fixation where an attacker can use a fake session id to log in to your account
        session()->regenerate();
        
        return redirect('/')->with('success', 'Welcome back!');

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Good Bye!');
    }
}
