<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function store(Post $post){
       
         $post->likes()->create([
            'user_id' => Auth::user()->id,
        ]);
        return back(); 
    }
    public function destroy(Post $post){
        Auth::user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
