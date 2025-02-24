<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;


Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::post('/tasks/reorder', [TaskController::class, 'reorder']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
