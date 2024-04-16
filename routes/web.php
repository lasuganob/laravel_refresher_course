<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;

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

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::resource('/admin/posts', Admin\AdminPostController::class, [
            'names' => [
                'index' => 'admin.posts.index',
                'show' => 'admin.posts.show',
                'create' => 'admin.posts.create',
                'edit' => 'admin.posts.edit',
                'destroy' => 'admin.posts.destroy',
            ]
        ])->except(['store', 'update']);

        Route::middleware('sanitizeText')->group(function () {
            Route::resource('/admin/posts', Admin\AdminPostController::class, [
                'names' => [
                    'store' => 'admin.posts.store',
                    'update' => 'admin.posts.update',
                ]
            ])->only(['store', 'update']);
        });
    });

    //User Route
    Route::middleware('user')->group(function () {
        Route::resource('/user/posts', User\UserPostController::class, [
            'names' => [
                'index' => 'user.posts.index',
                'show' => 'user.posts.show',
                'create' => 'user.posts.create',
                'edit' => 'user.posts.edit',
                'destroy' => 'user.posts.destroy',
            ]
        ])->except(['store', 'update']);

        Route::middleware('sanitizeText')->group(function () {
            Route::resource('/user/posts', User\UserPostController::class, [
                'names' => [
                    'store' => 'user.posts.store',
                    'update' => 'user.posts.update',
                ]
            ])->only(['store', 'update']);
        });
    });

});

require __DIR__.'/auth.php';
