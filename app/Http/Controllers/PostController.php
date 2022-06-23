<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = Auth::user();
        $posts = Post::where('user_id',$user->id)->get();
           return view('post.index',[
               'posts'=> $posts
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   
        $user = Auth::user();
        $validated = $request->validated();
        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
       
        Post::create([
            'title' => $request->input('title'),
            'description' =>$request->input('description'),
            'image_path' => $newImageName,
            'category_id' =>$request->input('category'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('posts.index')->with('success','user added !');
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
    public function edit(Post $post)
    {
        return view('post.edit',[
            'categories' => Category::all(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {  
        $newImageName = time().'-'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
       
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category');
        $post->image_path = $newImageName;
        $post->save();

        return redirect()->route('posts.index')->with('success'," post updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $destination = 'images/'.$post->image_path;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success','post deleted!');
    }
}
