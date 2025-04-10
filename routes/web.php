<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post', function () {
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
});
Route::get('/post/{id}', function ($id) {
    $post=[
        'id' => $id ,
        'title' => 'My First Post',
        'body' => 'This is the body of my first post',
        'created_by' => 'Hamdy'
    ];
    return view('post.view_post',['post' => $post]);
})->where('id', '[0-9]+');
Route::get('/post/{id}/edit', function ($id) {
    $post=[
        'id' => $id ,
        'title' => 'My First Post',
        'body' => 'This is the body of my first post',
        'created_by' => 'Hamdy'
    ];
    return view('post.update',['post' => $post]);
})->where('id', '[0-9]+');
Route::put('/post/{id}', function ($id) {
    return "Update Post with ID: $id Successfully"; 
})->where('id', '[0-9]+');
Route::post('/post', function () {
    return "Create Post Successfully";

});
Route::get('/post/create', function () {
    return view('post.create');
});
Route::delete('/post/{id}', function ($id) {
    return "Delete Post with ID: $id Successfully"; 
})->where('id', '[0-9]+');