<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClubController;
use App\Models\Club;

Route::model('club', Club::class);

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/login', [AdminController::class, 'loginShow'])->name('admin.login.show');
    Route::post('/login', [AdminController::class, 'loginPerform'])->name('admin.login.perform');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegistrationController::class, 'show'])->name('register.show');
    Route::post('/register', [RegistrationController::class, 'register'])->name('register.perform');
    Route::get('/register/verify', [RegistrationController::class, 'verify'])->name('email.verification.url');
});

Route::name('club.')
    ->prefix('club/{club}')
    ->middleware('auth')
    ->controller(ClubController::class)
    ->group(function () {

        Route::middleware('isClubManager')->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');

            Route::post('/join/accept', 'acceptJoinRequest')->name('join.accept');
            Route::post('/join/reject', 'rejectJoinRequest')->name('join.reject');

            Route::post('/block', 'blockUser')->name('user.block');
            Route::post('/unblock', 'unblockUser')->name('user.unblock');

            Route::delete('/members/{id}', 'removeMember')->name('member.remove');

            Route::get('/events/{id}', 'showEvent')->name('event.show');
            Route::get('/events/create', 'createEvent')->name('event.create');
            Route::post('/events', 'storeEvent')->name('event.store');
            Route::put('/events/{id}', 'updateEvent')->name('event.update');
            Route::delete('/events/{id}', 'deleteEvent')->name('event.delete');

            Route::put('/setting', 'updateSetting')->name('setting.update');
        });

        Route::post('/chats', 'createChat')->name('chat.create');
        Route::delete('/chats/{id}', 'deleteChat')->name('chat.delete');
    });
