<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GlitchesController,
    UsersController,
    GuestController,
    IMAPTestController,
    RoomController,
    StaffController,
    GlitchtypeController,
    GuestSatisfactionController,
    
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
    Route::patch('/glitches/update-follow_up_by/{id}', [App\Http\Controllers\GlitchesController::class, 'update_follow_up_by'])->name('glitches.follow_up_by');
    Route::patch('/glitches/update_satisfaction/{id}', [App\Http\Controllers\GlitchesController::class, 'update_satisfaction'])->name('glitches.satisfaction');
    Route::get('/glitches/delete-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'delete'])->name('glitches.delete');
    Route::post('/glitches/destroy-glitch/{id}', [App\Http\Controllers\GlitchesController::class, 'destroy'])->name('glitches.destroy');
    Route::get('/glitches/reports', [App\Http\Controllers\GlitchesController::class, 'report'])->name('glitches.report');
    Route::get('/glitches/get_reports', [App\Http\Controllers\GlitchesController::class, 'get_report'])->name('glitches.get_report');
    Route::get('/glitches/get_DayEndReport', [App\Http\Controllers\GlitchesController::class, 'generateDayEndReport'])->name('glitches.generateDayEndReport');
    
    
    Route::get('/rooms/upload-guest', [App\Http\Controllers\GuestController::class, 'upload'])->name('guest.upload');
    Route::post('/rooms/update-guest', [App\Http\Controllers\GuestController::class, 'update'])->name('guest.update');
    Route::post('/rooms/update-guest', [App\Http\Controllers\GuestController::class, 'updateGuestList'])->name('update-guest-list');
    Route::get('/update-guest-names', [RoomController::class, 'fetchEmailDetails'])->name('update-guest-names');

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

    
    Route::get('/staff/index', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::get('/staff/delete/{id}', [App\Http\Controllers\StaffController::class, 'delete'])->name('staff.delete');
    Route::post('/staff/destroy/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy');

    Route::get('/glitch_type/index', [App\Http\Controllers\GlitchtypeController::class, 'index'])->name('glitch_type.index');
    Route::get('/glitch_type/create', [App\Http\Controllers\GlitchtypeController::class, 'create'])->name('glitch_type.create');
    Route::post('/glitch_type/store', [App\Http\Controllers\GlitchtypeController::class, 'store'])->name('glitch_type.store');
    Route::get('/glitch_type/delete/{id}', [App\Http\Controllers\GlitchtypeController::class, 'delete'])->name('glitch_type.delete');
    Route::post('/glitch_type/destroy/{id}', [App\Http\Controllers\GlitchtypeController::class, 'destroy'])->name('glitch_type.destroy');
    
    Route::get('/guest_satisfaction/index', [App\Http\Controllers\GuestSatisfactionController::class, 'index'])->name('guest_satisfaction.index');
    Route::get('/guest_satisfaction/create', [App\Http\Controllers\GuestSatisfactionController::class, 'create'])->name('guest_satisfaction.create');
    Route::post('/guest_satisfaction/store', [App\Http\Controllers\GuestSatisfactionController::class, 'store'])->name('guest_satisfaction.store');
    Route::get('/guest_satisfaction/delete/{id}', [App\Http\Controllers\GuestSatisfactionController::class, 'delete'])->name('guest_satisfaction.delete');
    Route::post('/guest_satisfaction/destroy/{id}', [App\Http\Controllers\GuestSatisfactionController::class, 'destroy'])->name('guest_satisfaction.destroy');

});



//LOGIN LOGOUT ROUTES
Route::get('/login', [App\Http\Controllers\UsersController::class, 'get_login'])->name('user.get_login');
Route::post('/login', [App\Http\Controllers\UsersController::class, 'login'])->name('user.login');

// Route::get('/user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
// Route::post('/user/store', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');