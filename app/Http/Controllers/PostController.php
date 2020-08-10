<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
      $posts = DB::table('posts')->get();
        return view('posts.index',['posts'=>$posts]);
    }
      public function show($id)
    {
        $post = Post::find($id);
        $recentPosts = Post::where('id', '!=', $id)->orderBy('id', 'desc')->take(3)->get();
        return view('posts.show')->with([
            'post' => $post, 
            'recentPosts' => $recentPosts]);
    }
     public function temp(){
       return view('template');
     }
}