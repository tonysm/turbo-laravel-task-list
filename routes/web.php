<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskListsController;
use App\Http\Controllers\TaskListTasksController;
use App\Http\Controllers\Tasks\CompletedController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'taskLists' => $request->user()->taskLists()->oldest()->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('task-lists', TaskListsController::class)->only(['create', 'store']);
    Route::resource('task-lists.tasks', TaskListTasksController::class)->only(['create', 'store']);
    Route::resource('tasks', TasksController::class)->only(['edit', 'update']);
    Route::singleton('tasks.completed', CompletedController::class)->only(['update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
