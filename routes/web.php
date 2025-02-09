<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::get('/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/', [TaskController::class, 'store'])->name('task.store');
Route::get('/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
