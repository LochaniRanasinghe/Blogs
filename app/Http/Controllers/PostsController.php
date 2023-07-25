<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
     //Show post creating form
    public function create(){
        return view('posts.create');
    }

    
    //Store post details in the database
    public function store(Request $request){
    
        //dd($request->all());
        //validate() function takes as an array and we can specify the rules for each field 
        $formFields=$request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        //***Add user_id to the formField array 
        $formFields['user_id']=auth()->user()->id;

        //Create the post
        Posts::create($formFields);

        return redirect('/')->with('message', 'Post created successfully');
        
    } 

     //Show all posts
    public function index(){
        $posts=Posts::all();
        return view('welcome',compact('posts'));
    }

    //Show a single post
    public function show($postId){
        $posts=Posts::findOrFail($postId);
        return view('posts.show',compact('posts'));
    }
    
    //Manage Posts to get all the posts of the logged in user
    public function manage(){
            //***Get all the posts of the logged in user
            $posts=Posts::where('user_id',Auth::user()->id)->get();
             return view('posts.manage',compact('posts'));
    }

    public function edit(Posts $post){
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request,Posts $post){
        $formFields=$request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        //***Add user_id to the formField array 
        $formFields['user_id']=auth()->user()->id;

        //set the current post with the new formFields
        $post->update($formFields);

        return back()->with('message', 'Post Updated successfully');
    }

    

}