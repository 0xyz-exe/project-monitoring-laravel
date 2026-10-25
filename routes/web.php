<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('projects.index'));
Route::get('/dashboard', fn (Request $r) => redirect()->route('projects.index'))->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->whereNumber('id')->name('projects.show');
    Route::post('/projects/{id}/tasks', [ProjectController::class, 'task'])->whereNumber('id')->name('projects.tasks.store');
    Route::post('/projects/{id}/tasks/{task}/comments', [ProjectController::class, 'comment'])->whereNumber('id')->name('projects.comments.store');
    Route::post('/projects/{id}/members', [ProjectController::class, 'member'])->whereNumber('id')->name('projects.members.store');
    Route::post('/projects/{id}/milestones', [ProjectController::class, 'milestone'])->whereNumber('id')->name('projects.milestones.store');
    Route::post('/projects/{id}/risks', [ProjectController::class, 'risk'])->whereNumber('id')->name('projects.risks.store');
    Route::post('/projects/{id}/expenses', [ProjectController::class, 'expense'])->whereNumber('id')->name('projects.expenses.store');
    Route::get('/projects/{id}/report.csv', [ProjectController::class, 'export'])->whereNumber('id')->name('projects.export');
    Route::patch('/projects/{id}/tasks/{task}', [ProjectController::class, 'updateTask'])->whereNumber(['id','task'])->name('projects.tasks.update');
    Route::post('/projects/{id}/risks', [ProjectController::class, 'risk'])->whereNumber('id')->name('projects.risks.store');
    Route::post('/projects/{id}/expenses', [ProjectController::class, 'expense'])->whereNumber('id')->name('projects.expenses.store');
    Route::get('/projects/{id}/report.csv', [ProjectController::class, 'export'])->whereNumber('id')->name('projects.export');
    Route::patch('/projects/{id}/tasks/{task}', [ProjectController::class, 'updateTask'])->whereNumber(['id','task'])->name('projects.tasks.update');
});

require __DIR__.'/auth.php';
