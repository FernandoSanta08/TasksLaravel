<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/tareas', [TasksController::class, 'index'])->name('tasks');

Route::post('/tareas', [TasksController::class, 'store'])->name('tasks');

Route::get('/tareas/{id}', [TasksController::class, 'show'])->name('tasks-show');
Route::patch('/tareas/{id}', [TasksController::class, 'update'])->name('tasks-update');
Route::delete('/tareas/{id}', [TasksController::class, 'destroy'])->name('tasks-destroy');

Route::resource('categories', CategoriesController::class);