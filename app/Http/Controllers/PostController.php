<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }
    public function home()
    {
        $posts=Post::all();
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required|min:3|string',
        'description'=>'required',
        'user_id'=>'required|exists:users,id'

       ]);

       $post=new Post;
       $post->title=$request->title;
       $post->description=$request->description;
       $post->user_id=$request->user_id;
       $post->save();
       return back()->with('success','Post Added Successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
      $validate=  $request->validate([
            'title'=>'required|min:3|string',
            'description'=>'required',
            'user_id'=>'required|exists:users,id'
    
           ]);
           $post=Post::findOrFail($id);
           $post->update($validate);

         return redirect()->route('posts.index')->with('success','Post Updated Successfully');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post Deleted Successfully');
    }

    public function search(Request $request){
      $qu=$request->qu;
      $posts=Post::where('title','LIKE','%'.$qu.'%')->get();
      return view('posts.search',compact('posts'));

    }
}