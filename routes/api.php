<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post("/tasks",[TaskController::class,"store"]);
// Route::get("/tasks",[TaskController::class,"index"]);
// Route::put("/tasks/{id}",[TaskController::class,"update"]);
// Route::get("/tasks/{id}",[TaskController::class,"show"]);

// Route::delete("/tasks/{id}",[TaskController::class,"destroy"]);
Route::apiResource("tasks", TaskController::class)->middleware('auth:sanctum');
 Route::middleware('auth:sanctum')->group(function () {
    Route::prefix("profile")->group(function(){
        Route::post("/",[ProfileController::class,"store"]);
 Route::get("/{id}",[ProfileController::class,"show"]);
    });
//  Route::update("/profile/{id}",[ProfileController::class,"update"]);

 Route::get("/user/{id}/tasks",[UserController::class,"getusertasks"]);
//  here we add to pivot table
 Route::post("/tasks/{taskid}/categories",[TaskController::class,"addcategoriestotask"]);
 Route::get("/tasks/{taskid}/categories",[TaskController::class,"getcategoriestotask"]);
 Route::get("/categories/{catid}/tasks",[TaskController::class,"gettaskstocategories"]);
 Route::post("/categories/{catid}/tasks",[TaskController::class,"addtaskstocategories"]);

 Route::get("/task/all",[TaskController::class,"getalltasks"])->middleware("checkuserrule");

 Route::get("/task/ordered",[TaskController::class,"getorderedalltasks"]);

//  auth

Route::post("/logout",[UserController::class,"logout"]);
Route::post("tasks/{id}/favorite",action: [TaskController::class,"addtofavorite"]);
Route::delete("tasks/{id}/favorite",action: [TaskController::class,"removefromfavorite"]);
Route::get("task/favorites",action: [TaskController::class,"getfavoritetasks"]);
 });

 Route::post("/register",[UserController::class,"register"]);
 Route::post("/login",action: [UserController::class,"login"]);

