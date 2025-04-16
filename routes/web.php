<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/post', [PostController::class, "index"])->name('post.index');
// Route::get('/post/{id}', [PostController::class,"show"])->where('id', '[0-9]+')->name('post.show');
// Route::get('/post/{id}/edit', [PostController::class,"edit"])->where('id', '[0-9]+')->name('post.edit');
// Route::put('/post/{id}', [PostController::class,"update"])->where('id', '[0-9]+')->name('post.update');
// Route::post('/post', [PostController::class,"store"])->name('post.store');
// Route::get('/post/create', [PostController::class,"create"])->name('post.create');
// Route::delete('/post/{id}', [PostController::class,"delete"])->where('id', '[0-9]+')->name('post.delete');

Route::resource('post', PostController::class);

//restore soft delete
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('post.trashed');
Route::get('/posts/restore/{id}', [PostController::class, 'restore'])->name('post.restore');