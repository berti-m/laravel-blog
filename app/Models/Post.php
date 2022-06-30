<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($posts, array $filters){
        if ($filters['category'] ?? false){
            $posts->where(function($post) use ($filters){
                $post->whereHas('category', function($cat) use ($filters){
                    return $cat->where('slug', $filters['category']);
                });
            });
        }
        if ($filters['search'] ?? false){
            $posts->where(function($query) use ($filters){
                $query->where('title', 'like', '%'.$filters['search'].'%')
                ->orWhere('excerpt', 'like', '%'.$filters['search'].'%')
                ->orWhere('body', 'like', '%'.$filters['search'].'%');
            });
        }

        if ($filters['author'] ?? false){
            $posts->where(function($post) use ($filters){
                $post->whereHas('author', function($a) use ($filters){
                    return $a->where('username', $filters['author']);
                });
            });
        }

        
    }
}
