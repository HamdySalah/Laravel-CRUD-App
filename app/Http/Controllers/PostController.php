<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function index(){
        $post= Post::all();
        return view('post.index',['post' => $post]);
    }
    // function veiw(){
    //     $post=[
    //     [
    //     'id' => 1,
    //     'title' => 'My First Post',
    //     'body' => 'This is the body of my first post',
    //     'created_by' => 'Hamdy'],
    //     [
    //     'id' => 2,
    //     'title' => 'My Second Post',
    //     'body' => 'This is the body of my second post', 
    //     'created_by' => 'Mohamed'],
    //     ['id' => 3,
    //     'title' => 'My Third Post',
    //     'body' => 'This is the body of my third post',
    //     'created_by' => 'Omar'],
    //     [
    //     'id' => 4,
    //     'title' => 'My Fourth Post',
    //     'body' => 'This is the body of my fourth post',
    //     'created_by' => 'Felo'],
    // ];
    // return view('post.posts',['post' => $post]);
    // }
    function show($id){
        $post= Post::find($id);
        if(!$post){
            return redirect()->route('post.index')->with('error', 'Post not found');
        }
        return view('post.view_post',['post' => $post]);
    }
    function create(){
        return view('post.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Post::create($validated);

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }
    function edit($id){
        $post=Post::find($id);
        return view('post.update',['post' => $post]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $post->update($validated);

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }
    function destroy($id){
        Post::destroy($id);
        return to_route('post.index')->with("Delete Post with ID: {{$id}} Successfully"); 
    }
}
