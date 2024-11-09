<?php


use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    /**
     * Trading
     */
    Route::get('/hello', function () {
        return 'Hello World';
    });

    Route::controller(TodoController::class)->group(function () {
        Route::get('taskList/{prodiverId}', 'taskList');

    });


});

