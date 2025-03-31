<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
});

Route::get('/ali', function () {
    return "ali salhab";
});
