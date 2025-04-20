<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->content = $req->content;
        $post->user_id = $req->user_id;
        $post->save();
        return 'Post created successfully.';
    }

    /**
     * Display the specified resource.
     */
    function show($id){
        $posts = Post::find($id);
        if(!$posts){
            return redirect()->route('post.index')->with('error', 'Post not found');
        }
        return new PostResource($posts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return 'Post updated successfully.';
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id){
        // Post::destroy($id);
        // return to_route('post.index')->with("Delete Post with ID: {{$id}} Successfully"); 
        $post = Post::findOrFail($id);
        $post->delete();
        return "Deleted post ID: {$id} successfully.";
    }
}
