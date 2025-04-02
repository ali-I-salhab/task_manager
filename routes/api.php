<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
// Route::get('/user', function (Request $request) {
//     return $request;
// });

// Route::post("/tasks",[TaskController::class,"store"]);
// Route::get("/tasks",[TaskController::class,"index"]);
// Route::put("/tasks/{id}",[TaskController::class,"update"]);
// Route::get("/tasks/{id}",[TaskController::class,"show"]);

// Route::delete("/tasks/{id}",[TaskController::class,"destroy"]);
Route::apiResource("tasks", TaskController::class);
 Route::post("/profile",[ProfileController::class,"store"]);
 Route::get("/profile/{id}",[ProfileController::class,"show"]);
 Route::get("/user/{id}/profile",[UserController::class,"getprofile"]);

 Route::get("/user/{id}/tasks",[UserController::class,"getusertasks"]);
 Route::post("/tasks/{taskid}/categories",[TaskController::class,"getcategoriestotask"]);
