<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\UserListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::prefix('email')->group(function () {
        Route::get('/verify', [EmailVerificationController::class, 'show'])->name('verification.notice');
        Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
            ->middleware('signed')->name('verification.verify');
        Route::post('/verification-notification', [EmailVerificationController::class, 'resend'])
            ->middleware('throttle:6,1')->name('verification.send');
    });
    Route::get('profile', function () {})->middleware('verified');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware('verified')->group(function () {
    Route::get('/', function () { return redirect('/work');});
    Route::get('/work', [AttendanceController::class, 'index']);
    Route::post('/work/start', [AttendanceController::class,'startWork']);
    Route::post('/work/end', [AttendanceController::class, 'endWork']);

    Route::post('/rest/start', [AttendanceController::class, 'startRest']);
    Route::post('/rest/end', [AttendanceController::class, 'endRest']);

    Route::get('/attendance', [AttendanceController::class, 'getAttendance']);
    Route::get('/select/date', [AttendanceController::class, 'selectDate']);

    Route::get('/users', [UserListController::class, 'index']);
    Route::get('/users/{id}/attendance', [UserListController::class, 'checkAttendance'])->name('user.attendance');
});
