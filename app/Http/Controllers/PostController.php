<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $post=[
            [
            'id' => 1,
            'title' => 'My First Post',
            'body' => 'This is the body of my first post',
            'created_by' => 'Hamdy'],
            [
            'id' => 2,
            'title' => 'My Second Post',
            'body' => 'This is the body of my second post', 
            'created_by' => 'Mohamed'],
            ['id' => 3,
            'title' => 'My Third Post',
            'body' => 'This is the body of my third post',
            'created_by' => 'Omar'],
            [
            'id' => 4,
            'title' => 'My Fourth Post',
            'body' => 'This is the body of my fourth post',
            'created_by' => 'Felo'],
        ];
        return view('post.index',['post' => $post]);
    }
    function veiw(){
        $post=[
        [
        'id' => 1,
        'title' => 'My First Post',
        'body' => 'This is the body of my first post',
        'created_by' => 'Hamdy'],
        [
        'id' => 2,
        'title' => 'My Second Post',
        'body' => 'This is the body of my second post', 
        'created_by' => 'Mohamed'],
        ['id' => 3,
        'title' => 'My Third Post',
        'body' => 'This is the body of my third post',
        'created_by' => 'Omar'],
        [
        'id' => 4,
        'title' => 'My Fourth Post',
        'body' => 'This is the body of my fourth post',
        'created_by' => 'Felo'],
    ];
    return view('post.posts',['post' => $post]);
    }
    function show($id){
        $post=[
            'id' => $id ,
            'title' => 'My First Post',
            'body' => 'This is the body of my first post',
            'created_by' => 'Hamdy'
        ];
        return view('post.view_post',['post' => $post]);
    }
    function create(){
        return view('post.create');
    }
    function store(Request $req){
        $data = $req;
        dd($data);
        $title = $data['title'];
        $body = $data['body'];
        return "Data Stoed Successfuly title => ".$title ." and Body =>".$body;
    }
    function edit($id){
        $post=[
            'id' => $id ,
            'title' => 'My First Post',
            'body' => 'This is the body of my first post',
            'created_by' => 'Hamdy'
        ];
        return view('post.update',['post' => $post]);
    }
    function update($id, Request $req){
        $data = $req -> all;
        dd($data);
        return "Update Successfuly";
    }
    function delete($id){
        return "Delete Post with ID: $id Successfully"; 
    }
}
