<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GlitchesController,
    UsersController,
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


Route::get('/', [App\Http\Controllers\GlitchesController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/Glitches/create-glitch', [App\Http\Controllers\GlitchesController::class, 'create'])->name('glitches.create');
    Route::post('/Glitches/store-glitch', [App\Http\Controllers\GlitchesController::class, 'store'])->name('glitches.store');
    Route::get('/Glitches/show-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'show'])->name('glitches.show');
    Route::get('/Glitches/edit-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'edit'])->name('glitches.edit');
    Route::put('/Glitches/update-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'update'])->name('glitches.update');
    Route::get('/Glitches/delete-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'delete'])->name('glitches.delete');
    Route::post('/Glitches/destroy-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'destroy'])->name('glitches.destroy');
    Route::get('/Glitches/reports', [App\Http\Controllers\GlitchesController::class, 'report'])->name('glitches.report');
    Route::get('/Glitches/get_reports', [App\Http\Controllers\GlitchesController::class, 'get_report'])->name('glitches.get_report');
});


Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');

//LOGIN LOGOUT ROUTES
Route::get('/login', [App\Http\Controllers\UsersController::class, 'get_login'])->name('user.get_login');
Route::post('/login', [App\Http\Controllers\UsersController::class, 'login'])->name('user.login');
Route::get('/logout', [App\Http\Controllers\UsersController::class, 'logout'])->name('user.logout');

// Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
// Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');