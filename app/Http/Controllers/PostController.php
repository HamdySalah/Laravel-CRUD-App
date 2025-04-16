<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function index(){
        // $post= Post::all();
        $posts = Post::whereNull('deleted_at')->get(); // or $posts = Post::all(); it same
        return view('post.index', ['post' => $posts]);
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
    public function store(StorePostRequest $req)
    {
        $validated = $req->validated();
        $data['user_id'] = $validated['user_id']; 
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('posts', $imageName, 'public');
            $validated['image'] = $imagePath;
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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('posts', $imageName, 'public');
            $validated['image'] = $imagePath;
        }

        $post->update($validated);

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }
    function destroy($id){
        // Post::destroy($id);
        // return to_route('post.index')->with("Delete Post with ID: {{$id}} Successfully"); 
        $post = Post::findOrFail($id);
        $post->delete();//soft
        return redirect()->route('post.index')->with('success', "Deleted post ID: {$id} successfully.");
    }
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('post.trashed', compact('posts'));
    }
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('post.trashed')->with('success', 'Post restored successfully.');
    }
}
