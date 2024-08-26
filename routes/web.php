<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('ideas/')->name('ideas.')->controller(IdeaController::class)->group(function () {
    Route::get('/{idea}', 'show')->name('show');
    Route::middleware('auth')->group(function () {
        Route::get('/{idea}/edit', 'edit')->name('edit');
        Route::post('/', 'store')->name('create');
        Route::put('/{idea}', 'update')->name('update');
        Route::delete('/{idea}', 'destroy')->name('destroy');
    });
});

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.create')->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
Route::post('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');



