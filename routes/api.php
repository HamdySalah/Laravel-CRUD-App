<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Validation\ValidationException;



// Route::get("post",[PostController::class,'index']);
Route::get("post/{id}",[PostController::class,'show']);
// Route::post("post",[PostController::class,'store']);
// Route::post("post/{id}",[PostController::class,'update']);
// Route::delete("post/{id}",[PostController::class,'destroy']);

// Route::get("user",[UserController::class,'index']);
// Route::get("user/{id}",[UserController::class,'show']);
// Route::post("user",[UserController::class,'store']);
// Route::post("user/{id}",[UserController::class,'update']);
// Route::delete("user/{id}",[UserController::class,'destroy']);


 
// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);
 
//     $user = User::where('email', $request->email)->first();
 
//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }
 
//     return $user->createToken($request->device_name)->plainTextToken;
// });