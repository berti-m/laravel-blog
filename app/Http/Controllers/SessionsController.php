<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        // Rule::exists('users', 'email')
        $attributes = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        if (!auth()->attempt($attributes)){
            // Wrong email/password
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials are wrong!'
            ]);
            /* Behind the scenes:
            return back()->withInput()
            ->withErrors(['email' => 'Your provided credentials are wrong!']);*/     
        }

        // because of session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'Welcome, '.auth()->user()->name.'!');
        
    }

    public function destroy(){
        $user = auth()->user()->name;
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye, '.$user.'!');
    }
}
