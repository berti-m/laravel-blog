<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        return view('posts.index', [
            'posts' => Post::latest()->with('category', 'author')->filter(request(['search', 'category', 'author']))->simplePaginate(15)->withQueryString()
        ]);
    }

    public function show(Post $post){
        $post->increment('page_counter', 1);
        return view('posts.show', ['post' => $post->load('category', 'author', 'comments.author')]);
    }

    public function create(){
        return view('posts.create', [
            'categories' => Category::all()->sortBy('name')
        ]);
    }
    public function store(){
        $atr = $this->valid();
        Post::create($atr);
        return redirect('/posts/'.$atr['slug'])->with('success', 'Successfully posted!');
    }

    public function post_edit(Post $post){
        return view('posts.update', ['post' => $post, 'categories' => Category::all()->sortBy('name')]);
    }

    public function update(Post $post){
        $atr = $this->valid($post);
        $post->update($atr);
        return redirect('/posts/'.$atr['slug'])->with('success', 'Successfully edited!');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/')->with('success', 'Successfully deleted!');
    }

    public function valid(?Post $post = null){
        $post ??= new Post();
        $atr = request()->validate([
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post), 'string'],
            'category_id' => ['required', Rule::exists('categories', 'id'), 'numeric'],
            'thumbnail' => ['image', 'max:99000']
        ]);
        if(isset($atr['thumbnail'])){
            $atr['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        }
        $atr['user_id'] = auth()->user()->id;
        return $atr;
    }
}
