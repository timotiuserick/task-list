<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('project.index');
Route::get('/projects/create', [HomeController::class, 'create'])->name('project.create');
Route::post('/projects', [HomeController::class, 'store'])->name('project.store');
Route::get('/projects/{id}', [HomeController::class, 'show'])->name('project.show');
Route::get('/projects/{id}/edit', [HomeController::class, 'edit'])->name('project.edit');
Route::post('/projects/{id}', [HomeController::class, 'update'])->name('project.update');
Route::delete('/projects/{id}', [HomeController::class, 'destroy'])->name('project.destroy');

Route::get('/projects/{projectId}/tasks', [TaskController::class, 'index'])->name('task.index');
Route::get('/projects/{projectId}/tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/projects/{projectId}/tasks', [TaskController::class, 'store'])->name('task.store');
Route::post('/projects/{projectId}/tasks/sort', [TaskController::class, 'sort'])->name('task.sort');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
