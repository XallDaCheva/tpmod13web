<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/coba', function () {
    return view('coba');
});

use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index']);
Route::post('/tasks', [TasksController::class, 'store']);
Route::get('/tasks/{id}/edit', [TasksController::class, 'edit']);
Route::put('/tasks/{id}', [TasksController::class, 'update']);
Route::delete('/tasks/{id}', [TasksController::class, 'destroy']);
