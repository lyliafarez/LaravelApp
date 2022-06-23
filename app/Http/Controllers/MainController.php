<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function index(){
        $articles=Article::paginate(4);
        return view('articles',[
            'articles'=>$articles,
        ]);
    }

    public function show(Article $article){
        return view('article',[
            'article'=>$article,
        ]);
    }
    
    public function showPosts(){
        $posts = Post::paginate(4);
        return view('posts',[
            'posts' => $posts,
        ]);
    }

    public function showPost(Post $post){
        $comments = Comment::where('post_id',$post->id)->get();
        return view('post',[
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
