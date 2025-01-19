<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GlitchesController,
    UsersController,
    GuestController,
};
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


//Route::get('/', [App\Http\Controllers\GlitchesController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\GlitchesController::class, 'index'])->name('home');

    Route::get('/glitches/all-glitchs', [App\Http\Controllers\GlitchesController::class, 'all_glitches'])->name('glitches.all_glitches');
    Route::get('/glitches/create-glitch', [App\Http\Controllers\GlitchesController::class, 'create'])->name('glitches.create');
    Route::post('/glitches/store-glitch', [App\Http\Controllers\GlitchesController::class, 'store'])->name('glitches.store');
    Route::get('/glitches/show-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'show'])->name('glitches.show');
    Route::get('/glitches/edit-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'edit'])->name('glitches.edit');
    Route::put('/glitches/update-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'update'])->name('glitches.update');
    Route::patch('/glitches/update-status-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'update_status'])->name('glitches.update_status');
    Route::get('/glitches/delete-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'delete'])->name('glitches.delete');
    Route::post('/glitches/destroy-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'destroy'])->name('glitches.destroy');
    Route::get('/glitches/reports', [App\Http\Controllers\GlitchesController::class, 'report'])->name('glitches.report');
    Route::get('/glitches/get_reports', [App\Http\Controllers\GlitchesController::class, 'get_report'])->name('glitches.get_report');

    
    Route::get('/rooms/upload-guest', [App\Http\Controllers\GuestController::class, 'upload'])->name('guest.upload');
    Route::post('/rooms/update-guest', [App\Http\Controllers\GuestController::class, 'update'])->name('guest.update');

    Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
    Route::get('/user/list', [App\Http\Controllers\UsersController::class, 'index'])->name('user.list');
    Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');
    Route::get('/user/edit-user/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
    Route::put('/user/update-glitch/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
    Route::get('/user/change-password', [App\Http\Controllers\UsersController::class, 'get_change_password'])->name('user.get_change_password');
    Route::put('/user/update-password/{id}', [App\Http\Controllers\UsersController::class, 'change_password'])->name('user.update_password');
    Route::get('/user/delete-glitch/{id}', [App\Http\Controllers\UsersController::class, 'delete'])->name('user.delete');
    Route::post('/user/destroy-glitch/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('user.logout');

});




//LOGIN LOGOUT ROUTES
Route::get('/login', [App\Http\Controllers\UsersController::class, 'get_login'])->name('user.get_login');
Route::post('/login', [App\Http\Controllers\UsersController::class, 'login'])->name('user.login');

// Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
// Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');