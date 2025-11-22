<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegistrationController;
use App\Http\Controllers\Authentication\AdminController;
use App\Http\Controllers\ClubController;
use App\Models\Club;
use App\Models\User;

Route::model('club', Club::class);
Route::model('event',Event::class);
Route::model('user', User::class);

Route::get('/', function () {
    return view('welcome');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/approve/{club}', [AdminController::class,'approveClub'])->name('club.approve');
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

            Route::post('/join/accept/{user}', 'acceptJoinRequest')->name('join.accept');
            Route::post('/join/reject/{user}', 'rejectJoinRequest')->name('join.reject');

            Route::post('/block/{users}', 'blockUser')->name('user.block');
            Route::post('/unblock/{user}', 'unblockUser')->name('user.unblock');

            Route::delete('/members/{user}', 'removeMember')->name('member.remove');

            Route::get('/events/{event}', 'showEvent')->name('event.show');
            Route::get('/events/create', 'createEvent')->name('event.create');
            Route::post('/events', 'storeEvent')->name('event.store');
            Route::put('/events/{event}', 'updateEvent')->name('event.update');
            Route::delete('/events/{event}', 'deleteEvent')->name('event.delete');

            Route::put('/setting', 'updateSetting')->name('setting.update');
        });

        Route::post('/chats', 'createChat')->name('chat.create');
        Route::delete('/chats/{id}', 'deleteChat')->name('chat.delete');
    });
