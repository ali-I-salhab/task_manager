<?php

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
