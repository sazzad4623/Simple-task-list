<?php

use App\Http\Requests\CategoryRequest;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// class Task


Route::get(
    '/',
    function () {
        return redirect()->route('tasks.index');
    }
);

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.destroy');

Route::get('/category/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/category/{category}', [CategoryController::class, 'delete'])->name('categories.destroy');


Route::get('/tag/index', [TagController::class, 'index'])->name('tags.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tags.store');
Route::get('/tag/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tag/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tag/{tag}', [TagController::class, 'delete'])->name('tags.destroy');
