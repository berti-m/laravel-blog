<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $atr = request()->validate([
            'name' => ['required','max:255','min:3'],
            'username' => ['required','max:255','min:3', Rule::unique('users', 'username')],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => ['required','max:255','min:7']
        ]);
        $atr['password'] = bcrypt($atr['password']);
        $user = User::create($atr);
        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created!');
    }
}
