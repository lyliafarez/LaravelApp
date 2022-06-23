<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $fillable = [
        'label'
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
