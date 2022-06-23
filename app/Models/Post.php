<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'category_id',
        'image_path',
        'user_id',
    ];
    public function dateFormatted(){
        return date_format($this->created_at,'d-m-Y');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function likedBy(){
        return $this->likes->contains('user_id',Auth::user()->id);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
