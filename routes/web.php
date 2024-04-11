<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admindashboard', [HomeController::class, 'index'])->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Create Customer Form
Route::middleware(['auth', 'customer'])->prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class,'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class,'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class,'store'])->name('customer.store');
    Route::get('/edit/{customer}', [CustomerController::class,'edit'])->name('customer.edit');
    Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/destroy/{customer}', [CustomerController::class,'destroy'])->name('customer.destroy');
});

require __DIR__.'/auth.php';
