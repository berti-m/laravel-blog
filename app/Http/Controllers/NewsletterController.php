<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function add_user(){
        request()->validate([
            'email' => ['required', 'email']
        ]);
        try {
            $new_subscriber = new Newsletter();
            $new_subscriber->subscribe(request('email'));
        } catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not be added!'
            ]);
        }        
        return redirect('/')->with('success', 'You are now subscribed to our newsletter!');
    }
}
