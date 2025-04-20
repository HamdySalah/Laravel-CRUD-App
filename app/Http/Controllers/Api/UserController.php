<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    function index(){
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $user = new User();
        $user->title = $req->title;
        $user->content = $req->content;
        $user->user_id = $req->user_id;
        $user->save();
        return 'User created successfully.';
    }

    /**
     * Display the specified resource.
     */
    function show($id){
        $users = User::find($id);
        if(!$users){
            return redirect()->route('post.index')->with('error', 'Post not found');
        }
        return new UserResource($users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->title = $request->title;
        $user->content = $request->content;
        $user->save();
        return 'User updated successfully.';
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id){
        // Post::destroy($id);
        // return to_route('post.index')->with("Delete Post with ID: {{$id}} Successfully"); 
        $user = User::findOrFail($id);
        $user->delete();
        return "Deleted User ID: {$id} successfully.";
    }
}
