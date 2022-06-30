<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class AuthorDropdown extends Component
{
    public function render()
    {
        return view('components.author-dropdown',
            ['authors' => User::all()->sortBy('name'),
            'currentAuthor' => (request('author') ?? false) ? User::firstWhere('username', request('author')) : null
        ]);
    }
}
