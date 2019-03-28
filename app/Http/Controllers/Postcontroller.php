<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostRequest;

class Postcontroller extends Controller
{
    //
    public function index(){
        // return view('home');
        // $posts = Posts::all();
        $posts = PostResource::collection(Posts::all());
        return $posts;
    }

    public function store(PostRequest $request){
        $posts = new Posts;
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->save();

        return new PostResource($posts);
    }

    public function update(Posts $post,PostRequest $request){
        $post->update(['title'=>$request->title,'content'=>$request->content]);

        return new PostResource($post);
    }

    public function destroy(Posts $post){
        $post->delete();
        return "Delete Success";
    }

    public function contact(){
        return view('contact');
    }
    //parse value to view
    //has two method 1.with function 2.compact function
    //one argu ->use with() function
    //one or more argu ->use compact() function

    /*public function myfunction($title){
        return view('home')->with('title',$title);
    }*/
    public function myfunction($title,$country){
        //return view('home')->with(array('title'=>$title,'country'=>$country)); // or
        return view('home',compact('title','country'));
    }

    //parse array value to view
    public function show(){
        $students=['Mg Mg','Aung Aung','Hla Hla'];
        return view('show',compact('students'));
    }


}
