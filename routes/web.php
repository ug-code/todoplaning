<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todo/{prodiverId}', [TodoController::class, 'todo']);
Route::get('/todoEqual/{prodiverId}', [TodoController::class, 'todoEqual']);
