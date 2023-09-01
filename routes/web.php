<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    // Default dashboard route
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {

            return redirect('/admin');
        } elseif ($user->hasRole('User')) {
            return  redirect('/user');
        }
    })->name('dashboard');


    Route::resource('/admin', AdminController::class);

    // User dashboard route
    Route::resource('/user', UserController::class);

    // Other routes...
    Route::get('change-status/{id}', [UserController::class, 'changeStatus'])->name('change-status');
    Route::get('email', [AdminController::class, 'createEmail'])->name('createEmail');
    Route::post('storeEmail', [AdminController::class, 'storeEmail'])->name('storeEmail');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
