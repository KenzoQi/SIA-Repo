<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController; 
use Illuminate\Support\Facades\Route;

// Define global variables for controllers
$profileController = ProfileController::class;
$homeController = HomeController::class;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () use ($profileController) {
    Route::get('/profile', [$profileController, 'edit'])->name('profile.edit');
    Route::patch('/profile', [$profileController, 'update'])->name('profile.update');
    Route::delete('/profile', [$profileController, 'destroy'])->name('profile.destroy');
});

// Registration routes
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



require __DIR__.'/auth.php';

Route::get('admin/home', [$homeController, 'index'])->middleware(['auth', 'admin']);
