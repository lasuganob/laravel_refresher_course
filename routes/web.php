<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin;
use \App\Http\Controllers\User;

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

// auto-generated by laravel/breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes role restrictions
Route::middleware('auth')->group(function () {
    Route::get('/',[User\UserPostController::class, 'index'])->name('home');

    //Admin Route
    Route::namespace('Admin')->prefix('admin')->group(function () {
        Route::get('/', [Admin\AdminPostController::class, 'index'])->name('admin.posts.index');

        Route::prefix('posts')->group(function () {
            Route::get('/create', [Admin\AdminPostController::class, 'create'])->name('admin.posts.create');
            Route::post('/', [Admin\AdminPostController::class, 'store'])->middleware('sanitizeText')->name('admin.posts.store');
            Route::get('/{post}', [Admin\AdminPostController::class, 'show'])->name('admin.posts.show');

            Route::middleware('admin')->group(function () {
                Route::get('/{post}/edit', [Admin\AdminPostController::class, 'edit'])->name('admin.posts.edit');
                Route::put('/{post}', [Admin\AdminPostController::class, 'update'])->middleware('sanitizeText')->name('admin.posts.update');
                Route::get('/{post}/destroy', [Admin\AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
             });
         });

    });

    //User Route
    Route::namespace('User')->prefix('user')->group(function () {
        Route::get('/', [User\UserPostController::class, 'index'])->name('user.posts.index');

        Route::prefix('posts')->group(function () {
            Route::get('/create', [User\UserPostController::class, 'create'])->name('user.posts.create');
            Route::post('/', [User\UserPostController::class, 'store'])->middleware('sanitizeText')->name('user.posts.store');
            Route::get('/{post}', [User\UserPostController::class, 'show'])->name('user.posts.show');

            Route::middleware('user')->group(function () {
                Route::get('/{post}/edit', [User\UserPostController::class, 'edit'])->name('user.posts.edit');
                Route::put('/{post}', [User\UserPostController::class, 'update'])->middleware('sanitizeText')->name('user.posts.update');
                Route::get('/{post}/destroy', [User\UserPostController::class, 'destroy'])->name('user.posts.destroy');
             });
         });

    });

});

require __DIR__.'/auth.php';
