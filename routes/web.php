<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskStatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('task_statuses', TaskStatusController::class)->only('index');
//Route::resource('task_statuses', TaskStatusController::class)
//    ->middleware('auth')->except('index');
//
//Route::resource('tasks', TaskController::class)
//    ->middleware(['auth', 'can:delete,task'])->only('delete');
//Route::resource('tasks', TaskController::class)
//    ->middleware('auth')->except('index', 'show');
//Route::resource('tasks', TaskController::class)->only('index', 'show');
//
//Route::resource('labels', LabelController::class)->only('index');
//Route::resource('labels', LabelController::class)
//    ->middleware('auth')->except('index');

Route::resource('task_statuses', TaskStatusController::class);
Route::resource('labels', LabelController::class);
Route::resource('tasks', TaskController::class);

require __DIR__ . '/auth.php';
