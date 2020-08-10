<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /**$posts = Post::all()
            ->rightJoin('users', 'users.id', '=', 'posts.user_id')
            ->get();**/
            $posts = Post::all();
        
       
        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new Post();
      $post->user_id = auth()->id();
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      if($request->hasFile('image')){
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '.' . $extension;
          $file->move('images/', $filename);
          $post->image = $filename;
      }else{
          return $request;
          $post->image = '';
      }
      $post->save();
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $recentPosts = Post::where('id', '!=', $id)
        ->orderBy('id', 'desc')->take(3)->get();
        return view('admin.posts.show')->with([
            'post' => $post, 
            'recentPosts' => $recentPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['file'],
        ]);
         if(request('image')){
        $attributes['image'] = request('image')->store('images');
         }
        $post->update($attributes);
        return redirect()->route('admin.post.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
       
        $post->delete();
        
        return redirect()->route('admin.post.index');
    }
}