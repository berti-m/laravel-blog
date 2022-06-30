<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create(){
        return view('category.create');
    }

    public function index(){
        return view('category.show', ['categories' => Category::all()->sortBy('name')]);
    }

    public function store(){
        $atr = request()->validate([
            'name' => ['required', 'string'],
            'slug' => ['required', 'string']
        ]);

        Category::create($atr);
        return redirect('/')->with('success', 'Category successfully created!');

    }

    public function destroy(){
        $atr = request()->validate([
            'category_id' => ['required', Rule::exists('categories', 'id'), 'numeric']
        ]);
        Category::find($atr['category_id'])->delete();
        return redirect('/')->with('success', 'Successfully deleted!');
    }
}
