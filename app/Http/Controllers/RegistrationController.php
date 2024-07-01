<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:5', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'min:5', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        # redirect to the home page and flash a message to the session eq to session('success') = $msg
        return redirect('/')->with('success', 'You have successfully registered.');
    }
}
