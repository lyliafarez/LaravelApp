<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Manager\ArticleManager;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function  __construct(ArticleManager $articleManager){
        $this->articleManager = $articleManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $articles=Article::paginate(10);
        return view('article.index',[
            'articles'=>$articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create',[
            'categories' => Category::all()   ,      
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {   
        $validated = $request->validated();
        //without using manager
        /* Article::create([
            'title'=>$request->input('title'),
            'subtitle'=>$request->input('subtitle'),
            'content'=>$request->input('content'),

        ]); */
        //using manager
        $this->articleManager->build(new Article(),$request);
        return redirect()->route('articles.index')->with('success',"L'article a été bien enregistré !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',[
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleManager->build($article,$request);

        return redirect()->route('articles.index')->with("warning",'L article a été bien modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy(Article $article){

        $article->delete();

        return redirect()->route('articles.index')->with('success',"L'article a été bien supprimé !")->except([
            'show'
        ]);
    }
}
